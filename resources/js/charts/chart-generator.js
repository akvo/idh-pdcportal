import Bar from "./options/Bar";
import Histogram from "./options/Histogram";
import Pie from "./options/Pie";
import Scatter from "./options/Scatter";
import Maps from "./options/Maps";
import CustomStackBar from "./options/CustomStackBar";

export const generateData = (col, line, height) => {
  return {
    column: col,
    line: line,
    style: {
      height: height,
      maxWidth: "100%",
      width: "100%",
    },
  };
};

export const generateOptions = (type, title, data, compare = false) => {
  switch (type) {
    case "MAPS":
      try {
        return Maps(title, data, compare);
      } catch (err) {
        console.error(err);
        return false;
      }
    case "PIE":
      return CustomStackBar(title, data, compare);
    case "REGULAR-PIE":
      return Pie(title, data);
    case "SCATTER":
      return Scatter(title, data);
    case "HISTOGRAM":
      return Histogram(title, data);
    case "HORIZONTAL-BAR":
      return Bar(title, data, true, false, compare);
    case "UNSORTED-HORIZONTAL-BAR":
      return Bar(title, data, true, true, compare);
    case "REGULAR-HORIZONTAL-BAR": // no top 5 filter
      return Bar(title, data, true, false, compare, false);
    default:
      return Bar(title, data, false, false, compare);
  }
};
