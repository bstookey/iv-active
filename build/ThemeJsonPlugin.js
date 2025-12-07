const fs = require("fs");
const path = require("path");
const Ajv = require("ajv");

class ThemeJsonPlugin {
  constructor(options) {
    this.srcDir = options.srcDir;
    this.themeRoot = options.themeRoot;
    this.outFile = options.outFile || "theme.json";
  }

  // Recursively get all .json files
  getAllJsonFiles(dir) {
    const entries = fs.readdirSync(dir, { withFileTypes: true });

    let files = [];

    for (const entry of entries) {
      const fullPath = path.join(dir, entry.name);

      if (entry.isDirectory()) {
        files = files.concat(this.getAllJsonFiles(fullPath));
      } else if (entry.name.endsWith(".json")) {
        files.push(fullPath);
      }
    }
    return files;
  }

  loadJSON(filepath) {
    const content = fs.readFileSync(filepath, "utf8");
    return JSON.parse(content);
  }

  deepMerge(target, source) {
    for (const key of Object.keys(source)) {
      if (
        typeof source[key] === "object" &&
        source[key] !== null &&
        !Array.isArray(source[key])
      ) {
        if (!target[key]) target[key] = {};
        this.deepMerge(target[key], source[key]);
      } else {
        target[key] = source[key];
      }
    }
    return target;
  }

  buildThemeJson() {
    // Load schema
    const schema = JSON.parse(
      fs.readFileSync(path.resolve(__dirname, "schema/theme.json"), "utf8")
    );

    // Start with version root
    let finalJson = { version: 3 };

    // Loop through EVERY .json file in src/theme/
    const jsonFiles = this.getAllJsonFiles(this.srcDir);

    jsonFiles.forEach((file) => {
      const partial = this.loadJSON(file);
      this.deepMerge(finalJson, partial);
    });

    // Validate theme.json
    const ajv = new Ajv({ allErrors: true, allowUnionTypes: true });
    const validate = ajv.compile(schema);

    if (!validate(finalJson)) {
      console.error("\n❌ theme.json validation failed:\n", validate.errors);
      process.exit(1);
    }

    // Output
    const outputPath = path.join(this.themeRoot, this.outFile);
    fs.writeFileSync(outputPath, JSON.stringify(finalJson, null, 2));

    console.log(`\n✔ theme.json generated with ${jsonFiles.length} partials`);
  }

  apply(compiler) {
    compiler.hooks.beforeCompile.tapAsync(
      "ThemeJsonPlugin",
      (params, callback) => {
        this.buildThemeJson();
        callback();
      }
    );
  }
}

module.exports = ThemeJsonPlugin;
