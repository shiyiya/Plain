const path = require('path');
const MiniCssExtractPlugin = require("mini-css-extract-plugin");

module.exports = {
  mode: "production",
  entry: {
    app: path.resolve(__dirname, 'index.js')
  },
  output: {
    path: path.resolve(__dirname, './dist/'),
    filename: './js/[name].[hash:8].js',
  },
  plugins: [
    new MiniCssExtractPlugin({
      filename: "./css/style.css",
    })
  ],
  module: {
    rules: [
      {
        test: /\.css$/,
        use: [
          {
            loader: MiniCssExtractPlugin.loader,
            options: {
              publicPath: '../'
            }
          },
          {
            loader: 'css-loader',
            options: {
              minimize: true,
              filename: 'style.min.css'
            }
          },
          { loader: 'postcss-loader' },
        ]
      }
    ]
  }
}