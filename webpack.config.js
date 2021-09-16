const path = require('path');
const MiniCssExtractPlugin = require("mini-css-extract-plugin");

const projectPaths = {
    projectDir:         path.resolve(__dirname, 'assets'),
    projectJsPath:      path.resolve(__dirname, 'src/js'),
    projectScssPath:    path.resolve(__dirname, 'src/scss')
}

module.exports = {
    entry: {
        'theme-pack': './assets/src/js/main.js',
        'theme-green': './assets/src/scss/main.scss',
        'theme-pink': './assets/src/scss/main-pink.scss'
    },
    output: {
        path: path.resolve(__dirname, 'assets'),
        filename: './dist/js/[name].bundle.js'
    },
    module: {
        rules: [
            {
                test: /\.(sass|scss)$/,
                use: [MiniCssExtractPlugin.loader, 'css-loader', 'sass-loader']
            },
            {
                test: /\.(woff(2)?|ttf|eot|svg)(\?v=\d+\.\d+\.\d+)?$/,
                type: 'asset/resource',
                generator: {
                    filename: 'dist/fonts/[hash][ext][query]'
                }
            }
        ]
    },
    plugins: [
        new MiniCssExtractPlugin({
            filename: './dist/css/[name].css'
        }),
    ]
}
