module.exports = {
  env: {
    browser: true,
    es2021: true,
    jquery: true,
    amd: true,
  },
  extends: ["eslint:recommended"],
  parserOptions: {
    ecmaVersion: "latest",
    sourceType: "module",
    ecmaFeatures: {
      jsx: true,
      modules: true,
    },
  },
  ignorePatterns: ["js.cookie.js", "widowadjust.js"],
  rules: {
    "no-unused-vars": "off",
  },
  globals: {
    // Cookies variable from apps file is not recognized by eslint. So let's tell eslint to ignore it
    Cookies: "readonly",
    wt: false,
    wp: "readonly", // Tell ESLint that wp is a global variable
  },
};
