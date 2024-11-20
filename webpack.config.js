const fs                        = require('fs');
const path                      = require('path');
const MiniCssExtractPlugin      = require('mini-css-extract-plugin');
const { CleanWebpackPlugin }    = require('clean-webpack-plugin');
const BundleAnalyzerPlugin      = require('webpack-bundle-analyzer').BundleAnalyzerPlugin;
const { WebpackManifestPlugin } = require('webpack-manifest-plugin');
const BrowserSyncPlugin         = require('browser-sync-webpack-plugin');
const { transpile } = require('typescript');


// Define the directories for entry files
const mainDir = path.resolve(__dirname, 'src/assets/js/');
const pagesDir = path.resolve(__dirname, 'src/assets/js/layouts/pages');
const layoutsDir = path.resolve(__dirname, 'src/assets/js/layouts');
const typesDir = path.resolve(__dirname, 'src/assets/js/types');

// Function to get entry files from a directory
const getEntriesFromDir = (dir) => {
  return fs.readdirSync(dir)
    .filter(file => file.endsWith('.ts')) // Filter only TypeScript files
    .reduce((acc, file) => {
      const name = path.basename(file, '.ts'); // Get file name without extension
      acc[name] = path.join(dir, file); // Create entry key-value pair
      return acc;
    }, {});
};

// Function to merge entries from multiple directories
const mergeEntries = (...dirs) => {
  return dirs.reduce((entries, dir) => {
    return { ...entries, ...getEntriesFromDir(dir) };
  }, {});
};

// Get entries from all directories
const entries = mergeEntries(mainDir, pagesDir, layoutsDir, typesDir);

const config = {
  entry: entries,
  output: {
    path: path.resolve(__dirname, 'dist'),
    filename: '[name].[contenthash].js'
  },
  devtool: 'source-map',
  module: {
    rules: [
      {
        test: /\.css$/,
        use: [
          MiniCssExtractPlugin.loader,
          {
            loader: 'css-loader',
            options: {
              importLoaders: 1
            }
          },
          'postcss-loader'
        ]
      },
      {
        test: /\.ts(x)?$/,
        loader: 'ts-loader',
        exclude: /node_modules/,
      }
    ]
  },
  plugins: [
    new CleanWebpackPlugin(),
    new MiniCssExtractPlugin(),
    new WebpackManifestPlugin({
      fileName: 'manifest.json',
      publicPath: '/dist',
    }),
    new BundleAnalyzerPlugin({
      analyzerMode: 'static',
      openAnalyzer: false,
    }),
    new BrowserSyncPlugin({
      proxy: 'https://verbit.local/',
      files: [
        './src/**/*.php',
        './src/assets/css/*.css',
        './dist/*.js'
      ],
      injectChanges: true,
      reloadDebounce: 500,
    })
  ],
  resolve: {
    extensions: [
      '.tsx',
      '.ts',
      '.js'
    ]
  },
  optimization: {
    splitChunks: {
      cacheGroups: {
        vendor: {
          test: /[\\/]node_modules[\\/]/,
          name: 'vendors',
          chunks: 'all'
        }
      }
    },
  }
};

module.exports = config;