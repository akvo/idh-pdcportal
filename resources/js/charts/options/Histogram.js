import {
  Color,
  Easing,
  Legend,
  TextStyle,
  ToolBox,
  backgroundColor,
  splitTitle,
} from "../chart-options.js";

export const Histogram = (title, data) => {
  let legend = data.data.map((x) => x.name);
  let tableData = [];
  data.data.map((x) => {
    return x.data.map((d) => {
      tableData.push([x.name, d[0], d[1]]);
    });
  });
  tableData = {
    header: ["Category", title, "Count"],
    data: tableData,
  };
  const values = data.data.map((x) => {
    // Filter age > 100 and age < 0
    const filtered = x.data.filter((x) => x[0] >= 0 && x[0] <= 100);
    return {
      name: x.name,
      type: "bar",
      data: filtered,
      markPoint: {
        data: [
          { type: "max", name: "min" },
          { type: "min", name: "max" },
        ],
        symbolSize: 30,
      },
      barMaxWidth: 1,
    };
  });
  const isLongLegend = legend.length > 10;
  return {
    title: {
      text: splitTitle(title),
      right: "center",
      top: "30px",
      ...TextStyle,
    },
    grid: {
      top: isLongLegend ? legend.length * 9 : 100,
      right: 30,
      left: 35,
      show: true,
      label: {
        color: "#222",
        ...TextStyle,
      },
    },
    tooltip: {
      trigger: "axis",
      axisPointer: {
        type: "cross",
        crossStyle: {
          color: "#999",
        },
      },
    },
    legend: {
      data: legend,
      ...Legend,
    },
    xAxis: {
      logBase: 10,
      axisPointer: {
        type: "shadow",
      },
    },
    yAxis: {
      type: "value",
      name: "Count",
      axisLabel: {
        ...TextStyle,
      },
    },
    series: values,
    data: tableData,
    ...Color,
    ...Easing,
    ...backgroundColor,
    ...ToolBox,
  };
};

export default Histogram;
