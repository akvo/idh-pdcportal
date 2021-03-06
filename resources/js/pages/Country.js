import React, { Component, Fragment, useState } from "react";
import { connect } from "react-redux";
import { mapStateToProps, mapDispatchToProps } from "../reducers/actions";
import { Redirect } from "react-router-dom";
import { Link, Switch, Route } from "react-router-dom";
import { Row, Col, Jumbotron, Nav, Dropdown } from "react-bootstrap";
import CountryTab from "./CountryTab.js";
import { FontAwesomeIcon } from "@fortawesome/react-fontawesome";
import intersectionBy from "lodash/intersectionBy";
import Loading from "../components/Loading";
import { auth } from "../data/api.js";

String.prototype.toTitle = function () {
  return this.replace(/(^|\s)\S/g, function (t) {
    return t.toUpperCase();
  });
};

function NavLink({ country, company, tab, active }) {
  const tabName = tab?.name?.replace("-", " ").toTitle();
  country = country.toLowerCase();
  return (
    <Nav.Link
      as={Link}
      to={"/country/" + country + "/" + company + "/" + tab?.link}
      active={active}
    >
      {tab?.link === "resources" ? (
        <FontAwesomeIcon icon={["fas", "download"]} />
      ) : (
        ""
      )}
      {tabName}
    </Nav.Link>
  );
}

class Country extends Component {
  constructor(props) {
    super(props);
    this.state = {
      loading: true,
      redirect: false,
    };
  }

  componentDidMount() {
    const token = localStorage.getItem("access_token");
    if (token === null) {
      this.props.user.logout();
      this.setState({ redirect: true });
    }
    if (token) {
      auth(token).then((res) => {
        const { status } = res;
        if (status === 401) {
          this.props.user.logout();
          this.setState({ redirect: true });
        }
        return res;
      });
    }
  }

  render() {
    if (this.state.redirect) {
      return <Redirect to="/login" />;
    }
    if (this.props.value.page.loading) {
      return <Loading />;
    }
    let params = this.props.match.params;
    let access = this.props.value.user.forms;
    access = access.map((x) => {
      return { ...x, id: x.form_id };
    });
    let country = params.country.toTitle();
    let companies = this.props.value.page.filters.find(
      (x) => x?.name?.toLowerCase() === country?.toLowerCase()
    );
    companies = intersectionBy(companies?.childrens, access, "id");
    let companyId = parseInt(params.companyId);
    let dropdownTitle = companies.find((x) => x.id === companyId);
    let resource = access.find((x) => x.id === companyId);
    if (!resource) {
      return <Loading />;
    }
    let tab = params.tab;
    let tabs = [
      {
        link: "overview",
        name: "overview",
      },
      {
        link: "farmer-profile",
        name: "farmer profile",
      },
      {
        link: "farm-characteristics",
        name: "farm characteristics",
      },
      {
        link: "farm-practices",
        name: "farm practices",
      },
      {
        link: "hh-profile",
        name: "household profile",
      },
      {
        link: "gender",
        name: "gender",
      },
    ];
    tabs = resource.access
      ? [...tabs, { link: "download", name: "download" }]
      : tabs;

    // custom country name
    const countryName = companies?.[0]?.country_name;

    return (
      <Fragment>
        <Jumbotron className="has-navigation">
          <Row className="page-header">
            <Col md={12} className="page-title text-center">
              <h2>Project in {countryName || country}</h2>
            </Col>
          </Row>
          <Row>
            <Col md={12} className="page-title text-center">
              <div className="case-dropdown-container">
                <div className="case-dropdown-wrapper">
                  <div className="case-text">Cases :</div>
                  <div className="case-list">
                    <Dropdown align="end" className="case-dropdown-button">
                      <Dropdown.Toggle
                        variant="ghost"
                        className="case-dropdown-toggle"
                      >
                        {dropdownTitle?.case_number
                          ? dropdownTitle.case_number +
                            " " +
                            dropdownTitle?.company
                          : dropdownTitle?.company}
                      </Dropdown.Toggle>
                      <Dropdown.Menu>
                        {companies.map((x, i) => (
                          <Dropdown.Item
                            key={i}
                            active={x.id === companyId}
                            onClick={() =>
                              this.props.history.push(
                                "/country/" +
                                  country.toLowerCase() +
                                  "/" +
                                  x.id +
                                  "/overview"
                              )
                            }
                          >
                            {x.case_number
                              ? x.case_number + " " + x?.company
                              : x?.company}
                          </Dropdown.Item>
                        ))}
                      </Dropdown.Menu>
                    </Dropdown>
                  </div>
                </div>
              </div>
            </Col>
          </Row>
          <Row id="component-will-stop">
            <Nav className="align-self-center nav-jumbotron">
              {tabs.map((x, i) => (
                <NavLink
                  key={i}
                  active={tab === x?.link}
                  country={country}
                  company={companyId}
                  tab={x}
                />
              ))}
            </Nav>
          </Row>
        </Jumbotron>
        <div className="page-content has-jumbotron">
          <Switch>
            <Route
              exact
              path="/country/:country/:companyId/:tab"
              component={CountryTab}
            />
          </Switch>
        </div>
      </Fragment>
    );
  }
}

export default connect(mapStateToProps, mapDispatchToProps)(Country);
