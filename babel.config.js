module.exports = function (api) {
  api.cache(true);
    return {
      presets: [
        [
          "@babel/preset-react",
          {
            "pragma": "wp.element.createElement"
          }
        ],
        "minify",
        "@babel/env"
      ]
    };
  }