import {
  Color,
  Easing,
  Legend,
  ToolBox,
  TextStyle,
  backgroundColor,
  splitTitle,
} from "../chart-options.js";
import { sumBy, sortBy } from "lodash";

// const bgcolors = ['#00b3b6', '#f2f2f2', '#ddd'];
const bgcolors = ["#68BED1", "#f2f2f2", "#ddd"];
export const CustomStackBar = (title, data, compare = false) => {
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
  let series = data.map((x, i) => {
    let percent = (x.value / total[0].value) * 100;
    return {
      name: x.name,
      type: "bar",
      stack: splitTitle(title),
      label: {
        show: true,
        position: "inside",
        formatter: "{a} \n{@score}%",
        fontWeight: "bolder",
        fontSize: "14",
        color: i === 0 ? "#fff" : "#000",
      },
      itemStyle: {
        color: bgcolors[i],
        borderColor: bgcolors[0],
        borderWidth: 2,
      },
      barWidth: "11%",
      data: [percent.toFixed(2)],
    };
  });
  return {
    title: {
      show: compare ? false : true,
      text: splitTitle(title),
      right: "center",
      top: "30px",
      ...TextStyle,
    },
    tooltip: {
      trigger: "item",
      formatter: "{b} <br/>{a}: {c}%",
    },
    legend: {
      data: legends,
      ...Legend,
    },
    xAxis: {
      show: false,
      type: "value",
    },
    yAxis: {
      show: false,
      type: "category",
      data: ["" + splitTitle(title) + ""],
    },
    series: series,
    data: tableData,
    ...Color,
    ...Easing,
    ...backgroundColor,
    ...ToolBox,
  };
};

export default CustomStackBar;
