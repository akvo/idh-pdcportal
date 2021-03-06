import React, { Component, Fragment } from "react";
import { Route, Redirect } from "react-router-dom";
import { connect } from "react-redux";
import { mapStateToProps, mapDispatchToProps } from "../reducers/actions";
import {
  Row,
  Col,
  Form,
  Button,
  Alert,
  Card,
  ListGroup,
  InputGroup,
  DropdownButton,
  Dropdown,
  Modal,
} from "react-bootstrap";
import { FontAwesomeIcon } from "@fortawesome/react-fontawesome";
import { flatFilters, initialNotification } from "../data/utils.js";
import { getUser, accessUser, deleteUser } from "../data/api";
import DataTable from "react-data-table-component";
import intersectionBy from "lodash/intersectionBy";
import Loading from "../components/Loading";
import JumbotronWelcome from "../components/JumbotronWelcome";

const customTableStyle = {
  rows: {
    style: {
      cursor: "pointer",
    },
  },
};

const initialPropsForm = [
  {
    id: 0,
    access: 0, //0 revoke,1 read,2 full access
  },
];

const tableColumns = [
  {
    name: "Name",
    selector: "name",
    sortable: true,
  },
  {
    name: "Email",
    selector: "email",
    sortable: true,
  },
  {
    name: "Role",
    selector: "role",
    sortable: true,
  },
  {
    name: "SDM Access",
    selector: "formLength",
    sortable: true,
  },
];

const defaultSelectedValue = {
  id: 0,
  name: "Loading",
  role: "Loading",
  forms: [
    {
      id: 0,
      access: 0,
    },
  ],
};

class Manage extends Component {
  constructor(props) {
    super(props);
    this.handleSubmit = this.handleSubmit.bind(this);
    this.handleDelete = this.handleDelete.bind(this);
    this.handleAccess = this.handleAccess.bind(this);
    this.handleRole = this.handleRole.bind(this);
    this.renderAccess = this.renderAccess.bind(this);
    this.renderForms = this.renderForms.bind(this);
    this.renderRole = this.renderRole.bind(this);
    this.searchEmail = this.searchEmail.bind(this);
    this.showDetail = this.showDetail.bind(this);
    this.state = {
      error: "",
      messages: {
        user: { type: "success", message: "" },
      },
      notification: initialNotification,
      users: [
        {
          id: 0,
          name: "Loading",
          role: "Loading",
          forms: [
            {
              id: 0,
              access: 0,
            },
          ],
        },
      ],
      selected: defaultSelectedValue,
      redirect: false,
      modalShow: false,
    };
  }

  handleSubmit(e) {
    e.preventDefault();
    const token = localStorage.getItem("access_token");
    if (token === null) {
      return;
    }
    let user = this.state.selected;
    accessUser(token, user).then((res) => {
      let users = this.state.users.map((x) => {
        if (x.id === user.id) {
          let userforms = user.forms.filter((f) => f.access !== 0);
          let formLength =
            user.role.toLowerCase() === "guest"
              ? userforms.length.toString()
              : "All";
          user = {
            ...user,
            role: user.role.toTitle(),
            forms: userforms,
            formLength: formLength,
          };
          return user;
        }
        return x;
      });
      this.setState({ notification: res, users: users });
      setTimeout(() => {
        this.setState({ notification: initialNotification });
      }, 3000);
    });
  }

  handleDelete(e) {
    e.preventDefault();
    this.setState({ modalShow: false });
    const token = localStorage.getItem("access_token");
    if (token === null) {
      return;
    }
    let user = this.state.selected;
    deleteUser(token, user).then((res) => {
      let users = this.state.users.filter((x) => x.id !== user.id);
      this.setState({
        notification: res,
        users: users,
        selected: defaultSelectedValue,
      });
      setTimeout(() => {
        this.setState({ notification: initialNotification });
      }, 3000);
    });
  }

  handleAccess(access, i) {
    access = { form_id: access.id, access: i };
    let current = this.state.selected.forms.filter(
      (x) => x.form_id !== access.form_id
    );
    current = access !== 0 ? [...current, access] : current;
    const user = { ...this.state.selected, forms: current };
    this.setState({ selected: user });
  }

  handleRole(e, role) {
    e.preventDefault();
    let user = this.state.selected;
    user = {
      ...user,
      role: role,
    };
    this.setState({ selected: user });
  }

  searchEmail() {}

  showDetail(user) {
    let forms = user.forms.map((x) => ({ ...x, access: x.access + 1 }));
    user = {
      ...user,
      forms: forms,
    };
    this.setState({ selected: user });
  }

  renderForms(access) {
    let forms = flatFilters(this.props.value.page.filters);
    forms = forms.map((x) => {
      let selectedAccess = access.find((a) => a.form_id === x.id);
      selectedAccess = selectedAccess ? selectedAccess.access : 0;
      return {
        ...x,
        access: selectedAccess,
      };
    });
    let accessType = ["No Access", "Read Only", "Full Access"];
    let variant = ["secondary", "primary", "success"];
    return (
      <ListGroup variant="flush">
        {forms.map((x, i) => (
          <ListGroup.Item key={"form-" + x.id}>
            <Row>
              <Col md={8}>{`${x.name} - ${x.company} - ${x.submission}`}</Col>
              <Col md={4} align={"right"}>
                <DropdownButton
                  variant={variant[x.access]}
                  alignRight
                  size="sm"
                  title={accessType[x.access]}
                  id="dropdown-menu-align-right"
                  className="dropdown-show-sm"
                >
                  {accessType.map((a, i) =>
                    i !== x.access ? (
                      <Dropdown.Item
                        key={"access-" + i}
                        className="dropdown-item-sm"
                        onClick={(e) => this.handleAccess(x, i)}
                      >
                        {" "}
                        {a}{" "}
                      </Dropdown.Item>
                    ) : (
                      ""
                    )
                  )}
                </DropdownButton>
              </Col>
            </Row>
          </ListGroup.Item>
        ))}
      </ListGroup>
    );
  }

  renderAccess(selected) {
    return (
      <>
        <Card.Header>Access</Card.Header>
        {this.renderForms(selected.forms)}
      </>
    );
  }

  renderRole(role) {
    let roles = ["admin", "analyst", "staff", "guest"];
    roles = roles.filter((x) => x !== role.toLowerCase());
    return roles.map((x, i) => (
      <Dropdown.Item
        key={"role-" + i}
        onClick={(e) => this.handleRole(e, x)}
        className="dropdown-item-sm"
      >
        {x.toTitle()}
      </Dropdown.Item>
    ));
  }

  componentDidMount() {
    const token = localStorage.getItem("access_token");
    if (token === null) {
      this.props.user.logout();
      this.setState({ redirect: true });
    }
    if (token !== null) {
      getUser(token).then((res) => {
        if (res === "unauthorized") {
          this.props.user.logout();
          this.setState({ redirect: true });
        }
        if (res !== "unauthorized") {
          let users = res.map((x) => {
            return {
              ...x,
              role: x.role.toTitle(),
              formLength:
                x.role !== "guest" ? "All" : x.forms.length.toString(),
            };
          });
          this.setState({ users: users });
        }
      });
    }
  }

  render() {
    const conditionalRowStyles = [
      {
        when: (row) => row.id === this.state.selected.id,
        style: {
          backgroundColor: "#ebf7ff",
        },
      },
    ];
    let admin = this.props.value.user;
    let error = this.state.error === "" ? false : this.state.error;
    let notification = this.state.notification;
    let forms = flatFilters(this.props.value.page.filters);
    let selected = this.state.selected;
    if (this.props.value.page.loading) {
      return <Loading />;
    }
    if (this.state.redirect) {
      return <Redirect to="/login" />;
    }
    return (
      <>
        <JumbotronWelcome text={"Welcome" + admin.name} />
        <div className="page-content has-jumbotron">
          {notification.active ? (
            <Row className="justify-content-md-center">
              <Col md={12}>
                <Alert
                  variant={notification.variant}
                  onClose={() =>
                    this.setState({
                      notification: {
                        ...notification,
                        active: false,
                      },
                    })
                  }
                  dismissible
                >
                  {notification.message}
                </Alert>
              </Col>
            </Row>
          ) : (
            ""
          )}
          <Row className="justify-content-md-center">
            <Col md={selected.id !== 0 ? 6 : 12}>
              <Card>
                <Card.Header>
                  <FontAwesomeIcon className="mr-2" icon={["fas", "user"]} />{" "}
                  Users
                </Card.Header>
                <Card.Body style={{ padding: "0px" }}>
                  <DataTable
                    className="table table-bordered table-sm"
                    columns={tableColumns}
                    data={this.state.users}
                    noHeader={true}
                    fixedHeader={true}
                    fixedHeaderScrollHeight={"500px"}
                    onRowClicked={this.showDetail}
                    defaultSortField="name"
                    conditionalRowStyles={conditionalRowStyles}
                    customStyles={customTableStyle}
                    highlightOnHover={true}
                  />
                </Card.Body>
              </Card>
            </Col>
            {selected.id !== 0 ? (
              <Col md={6}>
                <Card>
                  <Card.Header>User</Card.Header>
                  <ListGroup variant="flush">
                    <ListGroup.Item>
                      <Row>
                        <Col md={6}>Name</Col>
                        <Col md={6} align={"right"}>
                          {selected.name}
                        </Col>
                      </Row>
                    </ListGroup.Item>
                    <ListGroup.Item>
                      <Row>
                        <Col md={8}>Role</Col>
                        <Col md={4} align={"right"}>
                          <DropdownButton
                            alignRight
                            size="sm"
                            variant="secondary"
                            title={selected.role.toTitle()}
                            id="dropdown-menu-align-right"
                            className="dropdown-show-sm"
                          >
                            {this.renderRole(selected.role)}
                          </DropdownButton>
                        </Col>
                      </Row>
                    </ListGroup.Item>
                    <ListGroup.Item>
                      <Row>
                        <Col md={6}>
                          <Button
                            size="sm"
                            onClick={(e) =>
                              this.setState({
                                modalShow: true,
                              })
                            }
                            variant={"danger"}
                            block
                          >
                            Delete User
                          </Button>
                        </Col>
                        <Col md={6} align={"right"}>
                          <Button
                            size="sm"
                            onClick={(e) => this.handleSubmit(e)}
                            variant={"primary"}
                            block
                          >
                            Save Changes
                          </Button>
                        </Col>
                      </Row>
                    </ListGroup.Item>
                  </ListGroup>
                  {selected.role.toLowerCase() === "guest"
                    ? this.renderAccess(selected)
                    : ""}
                </Card>
              </Col>
            ) : (
              ""
            )}
          </Row>
        </div>

        <Modal
          key="modal-delet-user"
          show={this.state.modalShow}
          onHide={(e) => this.setState({ modalShow: false })}
          backdrop="static"
          keyboard={false}
        >
          <Modal.Header>
            <Modal.Title>Delete User</Modal.Title>
          </Modal.Header>
          <Modal.Body>
            {`Are you sure to delete user ${this.state.selected.name} ?`}
          </Modal.Body>
          <Modal.Footer>
            <Button
              variant="secondary"
              onClick={(e) => this.setState({ modalShow: false })}
            >
              No
            </Button>
            <Button onClick={(e) => this.handleDelete(e)} variant="primary">
              Yes
            </Button>
          </Modal.Footer>
        </Modal>
      </>
    );
  }
}

export default connect(mapStateToProps, mapDispatchToProps)(Manage);
