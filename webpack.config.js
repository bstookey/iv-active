// webpack.config.js
const path = require("path");
const fs = require("fs");
const webpack = require("webpack");
const MiniCssExtractPlugin = require("mini-css-extract-plugin");
const ESLintPlugin = require("eslint-webpack-plugin");
const BrowserSyncPlugin = require("browser-sync-webpack-plugin");
const SVGSpritemapPlugin = require("svg-spritemap-webpack-plugin");
const ThemeJsonPlugin = require("./build/ThemeJsonPlugin");

// --- Theme variables
const themename = "happytapir";
const themePath = `wp-content/themes/${themename}`;
const localURL = "http://localhost:8888/happytapirpress/";

const devPath = "src";
const distPath = "assets";

const jsPath = `${distPath}/js`;
const cssPath = `${distPath}/css`;
const imagesPath = `${distPath}/images`;

// --- Load theme.json
// const themeJSON = JSON.parse(
//   fs.readFileSync(path.resolve(__dirname, "theme.json"), "utf8")
// );

// --- Feature flags
const owlCarousel = true;
const bootstrap = true;
const cookieJs = true;

// --- Handle Bootstrap/Owl copies
if (bootstrap) {
  fs.mkdirSync(`${devPath}/scss/bootstrap`, { recursive: true });
  fs.mkdirSync(`${jsPath}`, { recursive: true });

  if (!fs.existsSync(`${devPath}/scss/bootstrap/_variables.scss`)) {
    fs.cpSync("node_modules/bootstrap/scss", `${devPath}/scss/bootstrap`, {
      recursive: true,
    });
  }

  if (!fs.existsSync(`${jsPath}/bootstrap.bundle.min.js`)) {
    fs.copyFileSync(
      "node_modules/bootstrap/dist/js/bootstrap.bundle.min.js",
      `${jsPath}/bootstrap.bundle.min.js`
    );
    fs.copyFileSync(
      "node_modules/bootstrap/dist/js/bootstrap.bundle.min.js.map",
      `${jsPath}/bootstrap.bundle.min.js.map`
    );
  }
}

if (owlCarousel) {
  fs.mkdirSync(`${imagesPath}`, { recursive: true });
  if (!fs.existsSync(`${imagesPath}/ajax-loader.gif`)) {
    fs.copyFileSync(
      "node_modules/owl.carousel/dist/assets/ajax-loader.gif",
      `${imagesPath}/ajax-loader.gif`
    );
  }
}

if (cookieJs && !fs.existsSync(`${devPath}/js/apps/js.cookie.js`)) {
  fs.mkdirSync(`${devPath}/js/apps`, { recursive: true });
  fs.copyFileSync(
    "node_modules/js-cookie/dist/js.cookie.js",
    `${devPath}/js/apps/js.cookie.js`
  );
}

// --- Main Webpack config
module.exports = (env, argv) => {
  const isProd = argv.mode === "production";

  return {
    context: path.resolve(__dirname),

    entry: {
      happytapir: `./${devPath}/js/happytapir.js`,
      editor: `./${devPath}/js/editor/editor.js`,
      admin: `./${devPath}/scss/admin-style.scss`,
      style: `./${devPath}/scss/happytapir.scss`,
    },

    output: {
      filename: `${jsPath}/[name].js`,
      path: path.resolve(__dirname, distPath),
      clean: false,
    },

    devtool: isProd ? "source-map" : "inline-source-map",

    module: {
      rules: [
        {
          test: /\.js$/,
          exclude: /node_modules/,
          use: {
            loader: "babel-loader",
            options: {
              presets: ["@babel/preset-env", "@babel/preset-react"],
            },
          },
        },
        {
          test: /\.(scss|css)$/,
          use: [
            MiniCssExtractPlugin.loader,
            {
              loader: "css-loader",
              options: { sourceMap: !isProd },
            },
            {
              loader: "postcss-loader",
              options: {
                postcssOptions: { plugins: [require("autoprefixer")] },
                sourceMap: !isProd,
              },
            },
            {
              loader: "sass-loader",
              options: {
                implementation: require("sass"),
                sourceMap: !isProd,
                additionalData: (content, loaderContext) => {
                  const themeJSON = JSON.parse(
                    fs.readFileSync(
                      path.resolve(__dirname, "theme.json"),
                      "utf8"
                    )
                  );

                  const encoded = JSON.stringify(themeJSON)
                    .replace(/\\/g, "\\\\")
                    .replace(/'/g, "\\'")
                    .replace(/"/g, '\\"');

                  return `$theme-json: '${encoded}';\n${content}`;
                },
              },
            },
          ],
        },
        {
          test: /\.svg$/,
          use: "svg-transform-loader",
        },
      ],
    },

    plugins: [
      new ThemeJsonPlugin({
        srcDir: path.resolve(__dirname, "src/theme"),
        themeRoot: path.resolve(__dirname),
        outFile: "theme.json",
      }),
      new MiniCssExtractPlugin({
        filename: `${cssPath}/[name].css`,
      }),
      new ESLintPlugin({
        extensions: ["js"],
        fix: true,
      }),
      new SVGSpritemapPlugin(`${devPath}/images/icons/*.svg`, {
        output: { filename: `${imagesPath}/icons/sprite.svg` },
        sprite: { prefix: false },
      }),
      new BrowserSyncPlugin(
        {
          proxy: localURL,
          files: [
            `${themePath}/**/*.php`,
            `${distPath}/**/*.js`,
            `${distPath}/**/*.css`,
          ],
          notify: false,
          open: false,
        },
        { reload: false }
      ),
      new webpack.DefinePlugin({
        "process.env.NODE_ENV": JSON.stringify(argv.mode),
      }),
    ],

    stats: "minimal",
  };
};
