import {
    Color,
    Icons,
    Easing,
    Legend,
    ToolBox,
    TextStyle,
    backgroundColor,
    splitTitle,
    dataZoom
} from "../chart-options.js";
import sum from "lodash/sum";
import sortBy from "lodash/sortBy";
import some from "lodash/some";
import { textWordWrap } from "../../data/utils.js";

export const Bar = (
    title,
    data,
    horizontal = false,
    unsorted = false,
    compare = false
) => {
    let withGender = some(data, "gender");
    let tableData = sortBy(data, "name");
    tableData = tableData.map(x => {
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
        data: tableData
    };
    data = sortBy(data, unsorted ? "name" : "value");
    let axisLabels = data.map(x => x.name);
    let values = data.map(x => x.value);
    let avg = 0;
    if (values.length > 0) {
        avg = sum(values) / values.length;
        avg = avg < 100 ? true : false;
    }
    let horizontalxAxis = {
        data: axisLabels,
        axisLabel: {
            // show: horizontal ? true : false,
            show: true,
            formatter: function(params) {
                return textWordWrap(params);
            }
        },
        axisTick: {
            show: horizontal ? true : false
        }
    };
    let horizontalyAxis = {
        axisLabel: {
            show: true
        },
        axisTick: {
            show: true
        }
    };

    let leftMargin = 100;
    leftMargin =
        data.filter(x => x.name.length >= 20).length !== 0 ? 200 : leftMargin;

    if (withGender) {
        let labelFormatter = {
            type: "bar",
            label: {
                formatter: function(params) {
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
                    fontSize: 12
                }
            }
        };
        let dimensions = ["category", "Male", "Female"];
        let source = data.map(x => {
            let m = x.gender.find(y => y.name.toLowerCase() === "male");
            let f = x.gender.find(y => y.name.toLowerCase() === "female");
            return {
                category: x.name,
                Male: typeof m !== "undefined" ? m["value"] : 0,
                Female: typeof f !== "undefined" ? f["value"] : 0,
                Male_count: typeof m !== "undefined" ? m["count"] : 0,
                Female_count: typeof f !== "undefined" ? f["count"] : 0
            };
        });
        return {
            title: {
                show: compare ? false : true,
                text: typeof title !== "undefined" ? splitTitle(title) : "",
                right: "center",
                top: "30px",
                ...TextStyle
            },
            grid: {
                top: 100,
                right: 50,
                // right: 10,
                // left: horizontal ? 35 : 10,
                left: horizontal ? 35 : leftMargin,
                show: true,
                label: {
                    color: "#222",
                    ...TextStyle
                }
            },
            legend: {
                data: ["Male", "Female"],
                ...Legend
            },
            tooltip: {
                trigger: "item",
                // formatter: "{a} <br/>{b}: {c}",
                formatter: function(params) {
                    let key = params.seriesName;
                    let count = key + "_count";
                    return (
                        key +
                        ": " +
                        params.data[key] +
                        "% (" +
                        params.data[count] +
                        ")"
                    );
                }
            },
            dataset: {
                dimensions: dimensions,
                source: source
            },
            xAxis: {},
            yAxis: {
                type: "category",
                show: true,
                axisLabel: {
                    show: true,
                    formatter: function(params) {
                        return textWordWrap(params);
                    }
                }
            },
            series: [labelFormatter, labelFormatter],
            data: tableData,
            ...Color,
            ...Easing,
            ...backgroundColor,
            ...ToolBox
        };
    }

    return {
        title: {
            show: compare ? false : true,
            text: splitTitle(title),
            right: "center",
            top: "30px",
            ...TextStyle
        },
        grid: {
            top: 100,
            right: 50,
            // right: 10,
            // left: horizontal ? 35 : 10,
            left: horizontal ? 35 : leftMargin,
            show: true,
            label: {
                color: "#222",
                ...TextStyle
            }
        },
        tooltip: {
            trigger: "item",
            // formatter: "{a} <br/>{b}: {c}",
            formatter: function(params) {
                return (
                    params.data.name +
                    ": " +
                    params.data.value +
                    "% (" +
                    params.data.count +
                    ")"
                );
            }
        },
        legend: {
            ...Legend
        },
        xAxis: horizontal ? horizontalxAxis : horizontalyAxis,
        yAxis: horizontal ? horizontalyAxis : horizontalxAxis,
        series: [
            {
                name: typeof title !== "undefined" ? splitTitle(title) : "",
                data: data,
                type: "bar",
                label: {
                    formatter: function(params) {
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
                        fontSize: 12
                    }
                }
            }
        ],
        data: tableData,
        ...Color,
        ...Easing,
        ...backgroundColor,
        ...ToolBox
    };
};

export default Bar;