import {
  Color,
  Easing,
  Legend,
  TextStyle,
  ToolBox,
  backgroundColor,
  splitTitle,
} from "../chart-options.js";
import { sumBy, sortBy } from "lodash";

export const Pie = (title, data) => {
  // if (!data.length) {
  //   return noDataText;
  // }
  let tableData = sortBy(data, "name");
  tableData = tableData.map((x) => {
    return [x.name, x.value];
  });
  tableData = {
    header: [title, "Count"],
    data: tableData,
  };
  let legends = data.map((x) => x.name);
  let total = [{ name: "total", value: sumBy(data, "value") }];
  return {
    title: {
      text: splitTitle(title),
      right: "center",
      top: "30px",
      ...TextStyle,
    },
    tooltip: {
      trigger: "item",
      formatter: "{b}: {c} ({d}%)",
    },
    legend: {
      data: legends,
      ...Legend,
      itemGap: 20,
      itemWidth: 10,
    },
    series: [
      {
        type: "pie",
        top: 50,
        radius: ["40%", "60%"],
        avoidLabelOverlap: false,
        label: {
          show: false,
          position: "center",
        },
        emphasis: {
          label: {
            show: false,
          },
        },
        labelLine: {
          show: false,
        },
        data: data,
      },
      {
        type: "pie",
        top: 50,
        radius: ["0%", "0%"],
        label: {
          show: true,
          position: "center",
          fontWeight: "bold",
          color: "#0072c6",
          formatter: function (params) {
            return "Total\n" + params.data.value;
          },
        },
        labelLine: {
          show: false,
        },
        data: total,
        color: ["#fff"],
      },
    ],
    data: tableData,
    ...Color,
    ...Easing,
    ...backgroundColor,
    ...ToolBox,
  };
};

export default Pie;
