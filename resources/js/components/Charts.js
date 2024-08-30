import React, { Component } from "react";
import { connect } from "react-redux";
import { mapStateToProps, mapDispatchToProps } from "../reducers/actions.js";
import { Col, Alert } from "react-bootstrap";
import ReactEcharts from "echarts-for-react";
import { generateOptions } from "../charts/chart-generator.js";
import { FontAwesomeIcon } from "@fortawesome/react-fontawesome";
import { isEmpty } from "lodash";

const barHeight = 120;

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
        {props?.kind?.toLowerCase() === "maps" ? (
          <div>
            <h5>Unable to Load Map</h5>
            <div>Apologies, we're currently unable to load the map.</div>
          </div>
        ) : (
          <div>
            <h5>No data has been collected</h5>
            <div>
              This variable is not collected as part of data collection
              activity.
            </div>
          </div>
        )}
      </Alert>
    </div>
  );
};

const RenderChart = ({
  props,
  options,
  style,
  onEvents,
  notMerge,
  lazyUpdate,
}) => {
  if (!isEmpty(props.dataset)) {
    if (props.dataset?.data?.length === 0) {
      return <NoDataAlert props={props} />;
    }
    return (
      <ReactEcharts
        option={options}
        notMerge={notMerge}
        lazyUpdate={lazyUpdate}
        style={style}
        onEvents={onEvents}
      />
    );
  }
  return <NoDataAlert props={props} />;
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
    const options = generateOptions(
      this.props.kind,
      this.props.title,
      this.props.dataset,
      this.props.compare
    );
    const onEvents = {
      click: this.clickEvent,
    };
    let style = this.props.config.style;
    if (this.props.kind === "BAR") {
      // const height = this.props.dataset.length * barHeight;
      /* Top 5 */
      const height = 5 * barHeight;
      /* End Top 5 */
      style = { ...style, height: `${height}px` };
    }
    if (this.props.config.column === 0) {
      if (!options) {
        return <NoDataAlert props={this.props} />;
      }
      return (
        <RenderChart
          props={this.props}
          options={options}
          notMerge={true}
          lazyUpdate={true}
          onEvents={onEvents}
          style={this.props.config.style}
        />
      );
    }
    return (
      <Col md={this.props.config.column} className={"mx-auto"}>
        {!options ? (
          <NoDataAlert props={this.props} />
        ) : (
          <div className="card-chart">
            <RenderChart
              props={this.props}
              options={options}
              notMerge={true}
              lazyUpdate={true}
              onEvents={onEvents}
              style={this.props.config.style}
            />
            {this.props.config.line ? <hr /> : ""}
          </div>
        )}
      </Col>
    );
  }
}

export default connect(mapStateToProps, mapDispatchToProps)(Charts);
