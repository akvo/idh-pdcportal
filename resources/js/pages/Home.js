import React, { Component, Fragment } from "react";
import { connect } from "react-redux";
import { Redirect } from "react-router-dom";
import { mapStateToProps, mapDispatchToProps } from "../reducers/actions";
import { Row, Col } from "react-bootstrap";
import Charts from "../components/Charts";
import { generateData } from "../charts/chart-generator.js";
import { flatFilters } from "../data/utils.js";
import JumbotronWelcome from "../components/JumbotronWelcome";
import { auth } from "../data/api.js";
import { orderBy } from "lodash";
import DataTable from "react-data-table-component";

const MapsOverride = (TableView) => {
  let config = {
    legend: {
      orient: "vertical",
      left: "left",
      top: 10,
      left: 10,
      data: [],
    },
    tooltip: {
      trigger: "item",
      showDelay: 0,
      padding: 0,
      transitionDuration: 0.2,
      formatter: TableView,
      backgroundColor: "#fff",
      position: [0, 0],
      textStyle: {
        color: "#222",
        fontFamily: "Gotham",
      },
    },
  };
  return config;
};

class Home extends Component {
  constructor(props) {
    super(props);
    this.TableView = this.TableView.bind(this);
    this.checkAuth = this.checkAuth.bind(this);
    this.state = {
      charts: [],
      redirect: false,
    };
  }

  TableView(params) {
    let project = "Project";
    let value = "No Data";
    if (typeof params.data !== "undefined") {
      value = params.data.value;
      project += params.data.value > 1 ? "s" : "";
    }
    let html = '<table class="table table-sm table-bordered">';
    html += '<thead class="thead-dark">';
    html += "<tr>";
    html += '<th width="200">Country</th>';
    html += '<th width="50" class="text-right">' + project + "</th>";
    html += "</tr>";
    html += "</thead>";
    html += "<tbody>";
    html += "<tr>";
    html += "<td>" + params.name + "</td>";
    html += '<td class="text-right">' + value + "</td>";
    html += "</tr>";
    html += "</tbody>";
    return '<div class="tooltip-maps">' + html + "</div>";
  }

  checkAuth() {
    const token = localStorage.getItem("access_token");
    if (token === null) {
      this.props.user.logout();
      this.setState({ redirect: true });
      return;
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
    return;
  }

  componentDidMount() {
    this.props.page.loading(true);
    setTimeout(() => {
      this.checkAuth();
      this.props.page.loading(false);
    }, 1000);
  }

  render() {
    if (this.state.redirect) {
      return <Redirect to="/login" />;
    }

    const user = this.props.value.user;
    const page = this.props.value.page;
    let data = page.filters.map((x) => {
      return {
        name: x.name,
        value: x.childrens.length,
      };
    });

    let source = flatFilters(page.filters);
    source = orderBy(source, ["date"], ["desc"]);
    source =
      user.id === 0
        ? []
        : source.filter((x) => user.forms.find((f) => f.form_id === x.id));
    source = source.map((x, i) => {
      return {
        ...x,
        no: i + 1,
        country: x.name.split(" - ")[0],
      };
    });

    data = data.map((x) => {
      const first = source.find((s) => s.country === x.name);
      let link = false;
      if (first) {
        link =
          "/country/" + x.name.toLowerCase() + "/" + first.id + "/overview";
      }
      return { ...x, link: link };
    });

    // overide tanzania
    if (data) {
      data = data.map((x) => {
        if (x.name.toLowerCase() === "tanzania") {
          x.name = "United Republic of Tanzania";
        }
        return x;
      });
    }

    const maps = {
      title: "",
      data: {
        maps: "world",
        records: data,
        override: MapsOverride(this.TableView),
      },
      kind: "MAPS",
      config: generateData(12, false, "60vh"),
    };

    return (
      <Fragment>
        <JumbotronWelcome text={false} />
        <div className="page-content has-jumbotron">
          <Row>
            <Col md={12}>
              <Charts
                identifier={"map-home"}
                title={maps.title}
                dataset={maps.data}
                kind={maps.kind}
                config={maps.config}
              />
              <p className="visual-map-text">Number of users</p>
            </Col>
            <Col md={12}>
              <DataTable
                className="table table-bordered table-sm"
                columns={[
                  {
                    name: "No.",
                    selector: (row) => row?.no,
                    width: "50px",
                  },
                  {
                    name: "Country",
                    selector: (row) => row?.country,
                  },
                  {
                    name: "Crop",
                    selector: (row) => row?.kind,
                  },
                  {
                    name: "Company",
                    selector: (row) => row?.company,
                  },
                  {
                    name: "Total Submission",
                    selector: (row) => row?.total,
                  },
                  {
                    name: "Survey Conducted",
                    selector: (row) => row?.submission,
                  },
                  {
                    name: "Action",
                    selector: (row) => (
                      <a
                        target="_blank"
                        href={`/country/${row.country_link.toLowerCase()}/${
                          row.id
                        }/overview`}
                        className="btn btn-sm btn-primary btn-block"
                      >
                        View
                      </a>
                    ),
                  },
                ]}
                data={source || 0}
                highlightOnHover={true}
                pagination
              />
            </Col>
          </Row>
        </div>
      </Fragment>
    );
  }
}

export default connect(mapStateToProps, mapDispatchToProps)(Home);
