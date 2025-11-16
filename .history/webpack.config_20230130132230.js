/* ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ */
/* ~~~~~~~~~~ Webpack configuration ~~~~~~~~~~ */
/* ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ */

const path = require("path");
const webpack = require("webpack");
const TerserPlugin = require("terser-webpack-plugin");
const MiniCssExtractPlugin = require("mini-css-extract-plugin");
const OptimizeCSSAssetsPlugin = require("optimize-css-assets-webpack-plugin");
const BrowserSyncPlugin = require("browser-sync-webpack-plugin");
const CleanWebpackPlugin = require("clean-webpack-plugin");
const StyleLintPlugin = require("stylelint-webpack-plugin");
const WebpackNotifierPlugin = require("webpack-notifier");

/**
 * Set environment
 *
 * @type {string}
 */
const devMode = process.env.NODE_ENV !== "production";

/**
 * Check if current environment is development mode
 *
 * @type {boolean}
 */
const isDevMode = devMode ? true : false;

module.exports = {
  /**
   * Tells webpack to use its built-in optimizations accordingly
   *
   * @type {string}
   */
  mode: devMode ? "development" : "production",

  /**
   * Define stats type
   *
   * @type {string}
   */
  stats: "minimal",

  /**
   * Set application entry files for building.
   *
   * @type {Object}
   */
  entry: {
    // Pages

    // default_page: path.resolve(__dirname, "src/components/page-templates/default-page/index"),
    //default_page: path.resolve(__dirname, "src/components/template-parts/blocks/full-width/default-page/index"),
    default_page: path.resolve(
      __dirname,
      "src/components/template-parts/blocks/full-width/default-page/index"
    ),

    // Full Width
    acf_hero_banner: path.resolve(
      __dirname,
      "src/components/template-parts/blocks/full-width/hero-banner/index"
    ),
    acf_text_with_media: path.resolve(
      __dirname,
      "src/components/template-parts/blocks/full-width/text-with-media/index"
    ),
    acf_text_with_icons: path.resolve(
      __dirname,
      "src/components/template-parts/blocks/full-width/text-with-icons/index"
    ),
    acf_text_with_icons: path.resolve(
      __dirname,
      "src/components/template-parts/blocks/full-width/center-content/index"
    ),

    // Inner Block
    acf_center_content_with_nav_links: path.resolve(
      __dirname,
      "src/components/template-parts/blocks/inner/cta-with-nav-links/index"
    ),
  },

  /**
   * Output settings for application scripts.
   *
   * @type {Object}
   */
  output: {
    publicPath: "dist",
    path: path.resolve(__dirname, "dist"),
    filename: "[name].bundle.js",
  },

  /**
   * This option controls if and how source maps are generated.
   *
   * @type {String|false}
   */
  devtool: isDevMode ? "eval-cheap-source-map" : false,

  /**
   * Optimizations options for building.
   *
   * @type {Object}
   */
  optimization: {
    minimize: !isDevMode,
    minimizer: [
      new TerserPlugin({
        extractComments: true,
        terserOptions: {
          parallel: true,
          cache: true,
          ecma: 2016,
          warnings: false,
        },
      }),
      new OptimizeCSSAssetsPlugin({}),
    ],
    splitChunks: {
      cacheGroups: {
        vendors: {
          test: /[\\/]node_modules[\\/]/,
          name: "vendor",
          chunks: "all",
        },
      },
    },
  },

  /**
   * Common plugins which should run on every build.
   *
   * @type {Array}
   */
  plugins: [
    new webpack.LoaderOptionsPlugin({ minimize: isDevMode }),
    new CleanWebpackPlugin("dist"),
    new StyleLintPlugin({
      // cares about quality of CSS
      context: "src",
      syntax: "scss",
    }),
    new MiniCssExtractPlugin({
      // extracts CSS into separate files
      filename: "[name].css",
    }),
    new BrowserSyncPlugin(
      {
        // BrowserSync Configuration
        host: "localhost",
        port: 3000,
        proxy: "http://localhost/codelicious/",
        files: [
          {
            match: ["**/*.php", "src/**/*.js", "src/**/*.{sass,scss}"],
            fn: (event, file) => {
              if (event == "change") {
                const bs = require("browser-sync").get("bs-webpack-plugin");
                if (
                  file.split(".").pop() == "js" ||
                  file.split(".").pop() == "php"
                ) {
                  bs.reload();
                } else {
                  bs.reload("*.css");
                }
              }
            },
          },
        ],
        injectCss: true,
        notify: false,
      },
      {
        reload: false,
        name: "bs-webpack-plugin",
      }
    ),
    new WebpackNotifierPlugin({
      title: "Crunch",
    }),
  ],
  /**
   * Performance settings to speed up build times.
   *
   * @type {Object}
   */
  performance: {
    hints: false,
  },
  /**
   * Build rules to handle application assset files.
   *
   * @type {Object}
   */
  module: {
    rules: [
      {
        enforce: "pre",
        test: /\.js$/,
        exclude: /node_modules/,
        loader: "eslint-loader",
      },
      {
        test: /\.js$/,
        loader: "babel-loader",
        exclude: [
          /node_modules\/(?!(mmenu-js)\/).*/, // For the Jarallax replace this line with: exclude: /node_modules\/(?!(mmenu-js|jarallax|video-worker))/,
          // path.resolve(__dirname, "src/scripts/plugins/mixitup-pagination.js"),
        ],
        include: [
          path.resolve(__dirname, "src"),
          path.resolve(__dirname, "node_modules/mmenu-js"),
          // path.resolve(__dirname, "node_modules/jarallax"),
          // path.resolve(__dirname, "node_modules/video-worker"),
        ],
        options: {
          configFile: path.resolve(__dirname, "babel.config.js"),
        },
      },
      {
        test: /\.(sa|sc|c)ss$/,
        use: [
          {
            loader: MiniCssExtractPlugin.loader, // extracts CSS into separate files
          },
          {
            loader: "css-loader", // translates CSS into CommonJS modules
          },
          {
            loader: "postcss-loader", // Run post css actions
            options: {
              plugins: function () {
                // post css plugins, can be exported to postcss.config.js
                return [require("autoprefixer")];
              },
            },
          },
          {
            loader: "sass-loader", // compiles Sass to CSS
          },
          {
            loader: "sass-resources-loader",
            options: {
              resources: [
                "src/scss/base/bootstrap/bootstrap.scss",
                "src/scss/base/bootstrap/_variables.scss",
                "src/scss/base/bootstrap/_mixins.scss",
                "src/scss/_variables.scss",
                "src/scss/_mixin.scss",
                "src/scss/_function.scss",
                "src/scss/base/_reset.scss",
              ],
            },
          },
        ],
      },
      // {
      //     test: /bootstrap\.native/,
      //     use: {
      //         loader: "bootstrap.native-loader",
      //         options: {
      //             /**
      //              * Possible bootstrap 4 modules for import:
      //              * - alert
      //              * - button
      //              * - carousel
      //              * - collapse
      //              * - dropdown
      //              * - modal
      //              * - popover
      //              * - scrollspy
      //              * - tab
      //              * - tooltip
      //              */
      //             only: ["dropdown", "modal", "tab", "collapse"]

      //         }
      //     }
      // },
      {
        test: /\.(png|jpg|gif|svg)$/i,
        use: {
          loader: "url-loader", // transforms files into base64 URIs
          options: {
            limit: 8192,
            name: "[path][name].[ext]",
            publicPath: "../",
            emitFile: false,
          },
        },
      },
      {
        test: /\.(eot|ttf|woff|woff2)$/i,
        use: {
          loader: "url-loader", // transforms files into base64 URIs
          options: {
            limit: 8192,
            name: "[path][name].[ext]",
            publicPath: "../",
            emitFile: false,
          },
        },
      },
    ],
  },
};
