const path = require('path');
const MiniCssExtractPlugin = require("mini-css-extract-plugin");

module.exports = {
  mode: "production",
  entry: {
    app: path.resolve(__dirname, 'index.js')
  },
  output: {
    path: path.resolve(__dirname, './'),
    filename: './js/[name].js',
  },
  plugins: [
    new MiniCssExtractPlugin({
      filename: "./style.min.css",
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
              publicPath: './'
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
      },
      {
        test: /\.(png|svg|jpg|gif)$/,
        use: [
          {
            loader: 'url-loader',
            options: {
              limit: '1024',
              name: '[name].[ext]',
              outputPath: './images/',
            }
          }
        ]
      }
    ]
  }
}