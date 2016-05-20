var path = require("path");
module.exports = {
  entry: {
    app: ["./src/js/all.js"]
  },
  output: {
    path: path.resolve(__dirname, "dist"),
    publicPath: "/assets/",
    filename: "allBundled.js"
  }
};