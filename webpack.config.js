const path = require('path');
const webpack = require('webpack');
const ExtractTextPlugin = require("extract-text-webpack-plugin");
const OptimizeCssAssetsPlugin = require('optimize-css-assets-webpack-plugin');
const CompressionPlugin = require('compression-webpack-plugin');
const WebpackDevServer = require('webpack-dev-server');

const config = {
    entry: {
        main: path.resolve(__dirname, 'src/js/index.js'),
    },
    output: {
        path: path.resolve(__dirname, 'public'),
        publicPath: "/assets/",
        filename: 'js/main.js',
    },

    module: {
        rules: [
            {
                test: /\.scss$/,
                use: ExtractTextPlugin.extract({
                    fallback: 'style-loader',
                    use: ['css-loader', 'postcss-loader', 'sass-loader']
                }),
            },
            {
                test: /\.js$/,
                exclude: /(node_modules)/,
                loader: 'babel-loader',
                options: {
                    presets: ['es2015']
                }
            },
            {
                test: /\.(jpg|png|gif|svg)$/,
                use: {
                    loader: 'url-loader',
                    options: {
                        limit: 1000000,
                        fallback: 'file-loader',
                        name: 'images/[name].[hash].[ext]',
                    }
                }
            }
        ]
    },
    plugins: [
        new ExtractTextPlugin('css/[name].css')
    ],
    devtool: 'source-map'
};

//If true JS and CSS files will be minified
if (process.env.NODE_ENV === 'production') {
    config.plugins.push(
        new ExtractTextPlugin('/css/[name].min.css'),
        new OptimizeCssAssetsPlugin(),
        new CompressionPlugin({
            asset: "[path].gz[query]",
            algorithm: "gzip",
            test: /\.css$/,
            threshold: 10240,
            minRatio: 0.8
        })
    );

}

module.exports = config;