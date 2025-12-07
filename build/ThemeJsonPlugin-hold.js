const fs = require("fs");
const path = require("path");
const merge = require("deepmerge");
const Ajv = require("ajv");

class ThemeJsonPlugin {
  constructor({ srcDir, themeRoot, outFile }) {
    this.srcDir = srcDir;
    this.themeRoot = themeRoot;
    this.outFile = outFile;
  }

  loadJSON(filePath) {
    const fullPath = path.join(this.srcDir, filePath);
    return JSON.parse(fs.readFileSync(fullPath, "utf8"));
  }

  buildThemeJson() {
    const partials = this.loadJSON("partials.json");

    let finalJson = {
      $schema: "https://schemas.wp.org/trunk/theme.json",
      version: 3,
    };

    // Merge settings
    if (partials.settings) {
      partials.settings.forEach(
        (file) => (finalJson = merge(finalJson, this.loadJSON(file)))
      );
    }

    // Merge styles
    if (partials.styles) {
      partials.styles.forEach(
        (file) => (finalJson = merge(finalJson, this.loadJSON(file)))
      );
    }

    // Validate with WordPress schema
    const schema = JSON.parse(
      fs.readFileSync(path.resolve(__dirname, "schema/theme.json"), "utf8")
    );
    const ajv = new Ajv({ allErrors: true });
    const validate = ajv.compile(schema);

    if (!validate(finalJson)) {
      console.error("\n❌ theme.json validation failed:\n", validate.errors);
      process.exit(1);
    }

    // Write theme.json to theme root
    const outputPath = path.join(this.themeRoot, this.outFile);
    fs.writeFileSync(outputPath, JSON.stringify(finalJson, null, 2));

    console.log("✔ theme.json built successfully");
  }

  apply(compiler) {
    // Run for `webpack --watch`
    compiler.hooks.watchRun.tap("ThemeJsonPlugin", () => {
      this.buildThemeJson();
    });

    // Run for `webpack` build
    compiler.hooks.beforeRun.tap("ThemeJsonPlugin", () => {
      this.buildThemeJson();
    });
  }
}

module.exports = ThemeJsonPlugin;
