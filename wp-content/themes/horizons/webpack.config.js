
const path = require('path');
const webpack = require('webpack');

const MiniCssExtractPlugin = require('mini-css-extract-plugin');
const OptimizeCssAssetsPlugin = require('optimize-css-assets-webpack-plugin');
const { CleanWebpackPlugin } = require('clean-webpack-plugin');
const UglifyJsPlugin = require('uglifyjs-webpack-plugin');
const cssnano = require('cssnano');
const postcssPresetEnv = require('postcss-preset-env');

const JS_DIR = path.resolve(__dirname, 'src');
const BUILD_DIR = path.resolve(__dirname, 'BUILD');


const entry = {
    main: JS_DIR + '/main.js',
    scripts: JS_DIR + '/scripts.js',
    styles: JS_DIR + '/style.js',
}
const output = {
    path: BUILD_DIR,
    filename: '[name].js'
}
const rules = [
    {
        test: /\.js$/,
        include: JS_DIR,
        exclude: /node_modules/,
        use: 'babel-loader',

    },
    {
        test: /\.css$/,
        exclude: /node_modules/,
        use: [MiniCssExtractPlugin.loader,
            'css-loader',
        {
            loader: 'postcss-loader',
            options: {
                postcssOptions: {
                    plugins: [
                        postcssPresetEnv(),
                        cssnano({ preset: 'default', discardComments: { removeAll: true } })
                    ],
                },
            },
        }

        ],
    },
    {
        test: /\.(png|jpg|gif)$/i,
        use: [
            {
                loader: 'url-loader',
                options: {
                    limit: 8192,
                },
            },
        ],
    },
]
const plugins = (argv) => [
    new CleanWebpackPlugin({
        cleanStaleWebpackAssets: ('production' === argv.mode),
    }),
    new webpack.ProvidePlugin({
        $: "jquery",
        jQuery: "jquery",
        "window.jQuery": "jquery"
    }),
    new MiniCssExtractPlugin({
        filename: 'css/[name].css'
    }),

]
module.exports = (env, argv) => ({
    entry: entry,
    output: output,
    devtool: 'source-map',
    module: {
        rules: rules,
    },
    plugins: plugins(argv),
    optimization: {
        minimizer: [
            new UglifyJsPlugin({
                cache: false,
                parallel: true,
                sourceMap: false,
                extractComments: true,
            }),
            new OptimizeCssAssetsPlugin()
        ]
    },
    stats: {
        errorDetails: true
    },
    resolve: {
        extensions: ['.ts', '.js'],
        modules: ['src/javascript', 'node_modules'],
    },
    externals: {
        jquery: 'jQuery'
    }
});