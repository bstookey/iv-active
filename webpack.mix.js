/*
 *
 * Webpack/ Laravel Mix Asset Management
 *
 */

const path = require("path");
const mix = require("laravel-mix"); // Laravel Mix library for asset management
require("laravel-mix-eslint"); // ESLint plugin for code linting
const webpack = require("webpack"); // Import webpack for additional customization
const fs = require("fs"); // File system module, if needed for dynamic configurations

const SVGSpritemapPlugin = require("svg-spritemap-webpack-plugin");

// Set variables/
var themename = "iv-active";
const themePath = "wp-content/themes/" + themename + "";
const localURL = "http://localhost:8888/iv-active/";
const distPath = "assets";
const devPath = "src";
const staticCssPath = devPath + "/scss";
const staticJsPath = devPath + "/js";
const cssPath = distPath + "/css/";
const jsPath = distPath + "/js/";
const imagesPath = devPath + "/images/";

// Use veariables
const owlCarousel = true;
const bootstrap = true;
const cookieJs = true;

mix.webpackConfig({
  //stats: "verbose",
  module: {
    rules: [
      {
        test: /\.svg$/,
        use: "svg-transform-loader",
      },
      {
        test: /\.js$/, // Target JavaScript files
        exclude: /node_modules/, // Exclude node_modules
        use: {
          loader: "babel-loader", // Use Babel loader
          options: {
            presets: [
              "@babel/preset-env", // For modern JavaScript
              "@babel/preset-react", // For JSX support
            ],
          },
        },
      },
    ],
  },
  plugins: [
    new SVGSpritemapPlugin("src/images/icons/*.svg", {
      output: {
        filename: "assets/images/icons/sprite.svg",
      },
      sprite: {
        prefix: false,
      },
    }),
  ],
});

// Use Bootstrap
if (bootstrap) {
  if (!fs.existsSync("src/scss/bootstrap")) {
    mix.copy("node_modules/bootstrap/scss", "src/scss/bootstrap");
  }
  if (!fs.existsSync(jsPath + "bootstrap.bundle.min.js")) {
    mix.copy("node_modules/bootstrap/dist/js/bootstrap.bundle.min.js", jsPath);
  }
  if (!fs.existsSync(jsPath + "bootstrap.bundle.min.js.map")) {
    mix.copy(
      "node_modules/bootstrap/dist/js/bootstrap.bundle.min.js.map",
      jsPath
    );
  }
  mix.sass("src/scss/bootstrap.scss", cssPath);
}

// Use Owl Carousel
if (owlCarousel) {
  //const owlPath = staticAssetsPath + "/owl-carousel";
  if (!fs.existsSync(imagesPath + "/ajax-loader.gif")) {
    mix.copy(
      "node_modules/owl.carousel/dist/assets/ajax-loader.gif",
      imagesPath
    );
  }
  if (!fs.existsSync(staticCssPath + "/owl-carousel/owl.carousel.scss")) {
    mix.copy(
      "node_modules/owl.carousel/src/scss",
      staticCssPath + "owl-carousel"
    );
  }
  if (!fs.existsSync(jsPath + "/apps/owl.carousel.min.js")) {
    mix.copy(
      "node_modules/owl.carousel/dist/owl.carousel.min.js",
      jsPath + "apps"
    );
  }
}

// Cookie.js
if (cookieJs) {
  if (!fs.existsSync("src/js/apps/js.cookie.js")) {
    mix.copy("node_modules/js-cookie/dist/js.cookie.js", "src/js/apps/");
  }
}

mix
  .copy("src/images", "assets/images")
  .scripts("src/js/apps/", jsPath + "apps.js")
  .js("src/js/editor/buttons.js", jsPath + "editor.js")
  .js(["src/js/iv-active.js"], jsPath + "iv-active.js")
  .sass("src/scss/iv-active.scss", cssPath, {
    implementation: require("sass"),
  })
  .sass("src/scss/admin-style.scss", cssPath, {
    implementation: require("sass"),
  })
  .options({
    processCssUrls: false,
  })
  .eslint({
    fix: true,
    extensions: ["js"],
  })
  .browserSync({
    proxy: localURL, // set to your local instance url
    files: [
      `${themePath}/**/*.php`,
      `${distPath}/**/*.js`,
      `${distPath}/**/*.css`,
    ],
  });

// Configure source maps based on environment
if (process.env.NODE_ENV !== "production") {
  // Development environment
  mix
    .webpackConfig({
      devtool: "inline-source-map", // Generate inline source maps for debugging
    })
    .sourceMaps(); // Enable source maps
} else {
  // Production environment
  mix
    .webpackConfig({
      devtool: "source-map", // Generate standalone source maps for better debugging in production
    })
    .sourceMaps(); // Enable source maps
}
