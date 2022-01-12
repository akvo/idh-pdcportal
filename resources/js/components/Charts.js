import React, { Component } from "react";
import { connect } from "react-redux";
import { mapStateToProps, mapDispatchToProps } from "../reducers/actions.js";
import { Col, Alert } from "react-bootstrap";
import ReactEcharts from "echarts-for-react";
import { generateOptions } from "../charts/chart-generator.js";
import { FontAwesomeIcon } from "@fortawesome/react-fontawesome";
import isEmpty from "lodash/isEmpty";

const NoDataAlert = ({ props }) => {
  return (
    <div className="no-data-alert-container">
      <div className="chart-title">{props?.title || "No Title"}</div>
      <Alert
        key="no-data-alert"
        variant="danger"
        className="alert-body-wrapper"
      >
        <div>
          <FontAwesomeIcon icon={["fas", "times-circle"]} size="4x" />
        </div>
        <div>
          <h5>No data has been collected</h5>
          <div>
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc ipsum
            dignissim aliquam velit, nulla at mattis. Ut at semper adipiscing
            nullam.
          </div>
        </div>
      </Alert>
    </div>
  );
};
class Charts extends Component {
  constructor(props) {
    super(props);
    this.clickEvent = this.clickEvent.bind(this);
  }

  clickEvent(params) {
    if (params.seriesType === "map" && params.data) {
      if (params.data.link) {
        window.open(params.data.link);
      }
    }
  }

  render() {
    let options = generateOptions(
      this.props.kind,
      this.props.title,
      this.props.dataset,
      this.props.compare
    );
    let onEvents = {
      click: this.clickEvent,
    };
    if (this.props.config.column === 0) {
      return !isEmpty(this.props.dataset) ? (
        <ReactEcharts
          option={options}
          notMerge={true}
          lazyUpdate={true}
          onEvents={onEvents}
          style={this.props.config.style}
        />
      ) : (
        <NoDataAlert props={this.props} />
      );
    }
    return (
      <Col md={this.props.config.column} className={"mx-auto"}>
        <div className="card-chart">
          {!isEmpty(this.props.dataset) ? (
            <ReactEcharts
              option={options}
              notMerge={true}
              lazyUpdate={true}
              style={this.props.config.style}
              onEvents={onEvents}
            />
          ) : (
            <NoDataAlert props={this.props} />
          )}
          {this.props.config.line ? <hr /> : ""}
        </div>
      </Col>
    );
  }
}

export default connect(mapStateToProps, mapDispatchToProps)(Charts);
