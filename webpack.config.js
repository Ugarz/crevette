// webpack.config.js
var path = require('path');
var ExtractTextPlugin = require("extract-text-webpack-plugin");
module.exports = {
    // The standard entry point and output config
    entry: {
        cssBase: "./src/css",
        cssTheme: "./src/css"
    },
    output: {
        path: path.join(__dirname, "dist"),
        filename: "/js/[name].bundle.js",
        publicPath: "/assets/",
        chunkFilename: "[id].js"
    },
    module: {
        loaders: [
            // Extract css files
            {
                test: /\.css$/,
                loader: ExtractTextPlugin.extract("style-loader", "css-loader")
            },
            // Optionally extract less files
            // or any other compile-to-css language
            {
                test: /\.scss$/,
                loader: ExtractTextPlugin.extract("style-loader", "css-loader!sass-loader")
            }
            // You could also use other loaders the same way. I. e. the autoprefixer-loader
        ]
    },
    // Use the plugin to specify the resulting filename (and add needed behavior to the compiler)
    plugins: [
        new ExtractTextPlugin("/css/[name].css", {
            allChunks: true
        })
    ]
}