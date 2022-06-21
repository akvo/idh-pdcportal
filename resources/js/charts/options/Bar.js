import {
  Color,
  Easing,
  Legend,
  ToolBox,
  TextStyle,
  backgroundColor,
  splitTitle,
} from "../chart-options.js";
import { sum, sortBy, some, orderBy } from "lodash";
import { textWordWrap } from "../../data/utils.js";

const labelFormatter = {
  type: "bar",
  barWidth: "30%",
  label: {
    formatter: function (params) {
      return params.data.category;
    },
    position: "insideLeft",
    // show: horizontal ? false : true,
    show: false,
    color: "#222",
    fontFamily: "Raleway",
    padding: 5,
    backgroundColor: "rgba(255,255,255,.8)",
    textStyle: {
      ...TextStyle.textStyle,
      fontSize: 12,
    },
  },
};

export const Bar = (
  title,
  data,
  horizontal = false,
  unsorted = false,
  compare = false
) => {
  // if (!data.length) {
  //   return noDataText;
  // }
  let withGender = some(data, "gender");
  let tableData = sortBy(data, "name");
  tableData = tableData.map((x) => {
    if (withGender) {
      let tmp = "";
      x.gender.map((y, i) => {
        tmp += y.name + ": " + y.value;
        tmp += i !== x.gender.length - 1 ? "  |  " : "";
      });
      return [x.name, tmp];
    }
    return [x.name, x.value];
  });
  tableData = {
    header: [title, "Count"],
    data: tableData,
  };
  data = sortBy(data, unsorted ? "name" : "value");
  /* TOP 5 */
  if (!withGender) {
    data = orderBy(data, "value", "desc");
    data = data.filter((_, xi) => xi < 5);
    data = orderBy(data, "value", "asc");
  }
  /* End Top 5 */
  let axisLabels = data.map((x) => x.name);
  let values = data.map((x) => x.value);
  let avg = 0;
  if (values.length > 0) {
    avg = sum(values) / values.length;
    avg = avg < 100 ? true : false;
  }
  const horizontalxAxis = {
    data: axisLabels,
    axisLabel: {
      // show: horizontal ? true : false,
      show: true,
      formatter: function (params) {
        return textWordWrap(params);
      },
    },
    axisTick: {
      show: horizontal ? true : false,
    },
  };
  const horizontalyAxis = {
    axisLabel: {
      show: true,
    },
    axisTick: {
      show: true,
    },
  };

  let leftMargin = 150;
  leftMargin =
    data.filter((x) => x.name.length >= 20).length !== 0 ? 200 : leftMargin;

  if (withGender) {
    const dimensions = ["category", "Male", "Female"];
    const source = data.map((x) => {
      const m = x.gender.find((y) => y.name.toLowerCase() === "male");
      const f = x.gender.find((y) => y.name.toLowerCase() === "female");
      return {
        category: x.name,
        Male: m?.value || 0,
        Female: f?.value || 0,
        Male_count: m?.count || 0,
        Female_count: f?.count || 0,
      };
    });
    return {
      title: {
        show: compare ? false : true,
        text: title ? splitTitle(title) : "",
        right: "center",
        top: "10px",
        ...TextStyle,
      },
      grid: {
        top: 120,
        right: 50,
        left: horizontal ? 50 : leftMargin,
        show: true,
        label: {
          color: "#222",
          ...TextStyle,
        },
      },
      legend: {
        data: ["Male", "Female"],
        ...Legend,
      },
      tooltip: {
        trigger: "item",
        // formatter: "{a} <br/>{b}: {c}",
        formatter: function (params) {
          let key = params.seriesName;
          let count = key + "_count";
          return `${key} : ${params.data[key]}% (${params.data[count]})`;
        },
      },
      dataset: {
        dimensions: dimensions,
        source: source,
      },
      xAxis: {},
      yAxis: {
        type: "category",
        show: true,
        axisLabel: {
          show: true,
          formatter: function (params) {
            return textWordWrap(params);
          },
        },
      },
      series: [labelFormatter, labelFormatter],
      data: tableData,
      ...Color,
      ...Easing,
      ...backgroundColor,
      ...ToolBox,
    };
  }

  return {
    title: {
      show: compare ? false : true,
      text: splitTitle(title),
      subtext: "Displaying top 5 results",
      right: "center",
      top: "10px",
      ...TextStyle,
    },
    grid: {
      top: 120,
      right: 50,
      left: horizontal ? 50 : leftMargin,
      show: true,
      label: {
        color: "#222",
        ...TextStyle,
      },
    },
    tooltip: {
      trigger: "item",
      // formatter: "{a} <br/>{b}: {c}",
      formatter: function (params) {
        return `${params.data.name} : ${params.data.value}% (${params.data.count})`;
      },
    },
    legend: {
      ...Legend,
    },
    xAxis: horizontal ? horizontalxAxis : horizontalyAxis,
    yAxis: horizontal ? horizontalyAxis : horizontalxAxis,
    series: [
      {
        name: title ? splitTitle(title) : "",
        data: data,
        type: "bar",
        barWidth: "60%",
        label: {
          formatter: function (params) {
            return params.data.name;
          },
          position: "insideLeft",
          // show: horizontal ? false : true,
          show: false,
          color: "#222",
          fontFamily: "Raleway",
          padding: 5,
          backgroundColor: "rgba(255,255,255,.8)",
          textStyle: {
            ...TextStyle.textStyle,
            fontSize: 12,
          },
        },
      },
    ],
    data: tableData,
    ...Color,
    ...Easing,
    ...backgroundColor,
    ...ToolBox,
  };
};

export default Bar;
