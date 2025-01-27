const { addFilter } = wp.hooks;
const { createHigherOrderComponent } = wp.compose;
const { Fragment } = wp.element;
const { InspectorControls } = wp.blockEditor;
const { PanelBody, ToggleControl } = wp.components;
const { registerBlockType } = wp.blocks;

// Step 1: Add a custom attribute to the button block
const addCustomButtonAttribute = (settings, name) => {
  if (name === "core/buttons") {
    settings.attributes = {
      ...settings.attributes,
      isCustomToggleEnabled: {
        type: "boolean",
        default: false,
      },
    };
  }
  return settings;
};
addFilter(
  "blocks.registerBlockType",
  "custom/buttons-block/add-custom-attribute",
  addCustomButtonAttribute
);

// Step 2: Add the toggle control to the block's inspector controls
const withCustomButtonSettings = createHigherOrderComponent((BlockEdit) => {
  return (props) => {
    const { attributes, setAttributes, name } = props;

    if (name === "core/buttons") {
      return (
        <Fragment>
          <BlockEdit {...props} />
          <InspectorControls>
            <PanelBody title="Custom Settings" initialOpen={true}>
              <ToggleControl
                label="On Dark Background"
                checked={attributes.isCustomToggleEnabled}
                onChange={(value) =>
                  setAttributes({ isCustomToggleEnabled: value })
                }
              />
            </PanelBody>
          </InspectorControls>
        </Fragment>
      );
    }

    return <BlockEdit {...props} />;
  };
}, "withCustomButtonSettings");
addFilter(
  "editor.BlockEdit",
  "custom/buttons-block/with-custom-settings",
  withCustomButtonSettings
);

// Step 3: Save the custom attribute in the block's output
const saveCustomButtonAttribute = (element, blockType, attributes) => {
  if (blockType.name === "core/buttons" && attributes.isCustomToggleEnabled) {
    return wp.element.cloneElement(element, {
      ...element.props,
      className: `${element.props.className || ""} on-dark-background`,
    });
  }
  return element;
};
addFilter(
  "blocks.getSaveElement",
  "custom/button-block/save-custom-attribute",
  saveCustomButtonAttribute
);

// Remove WP reset styles from the dynamically-generated admin stylesheet, load-styles.php (WP 5.8)
//
// Note: The href contains all of the individual partials that are concatenated into a single CSS file.
//       All we have to do is remove “wp-reset-editor-styles” from the href. However, updating the
//       href will cause a long FOUC, so we’re adding a new stylesheet and then disabling
//       the original once the new one has loaded.
//
// Note: We can ignore <link> tags with IDs since this one doesn’t have one.
let linkTags = document.querySelectorAll('link[rel="stylesheet"]:not([id])');
// There should only be one matching link tag but we’re using forEach() just to be safe.
linkTags.forEach((tag) => {
  let href = tag.getAttribute("href");
  if (href.indexOf("load-styles.php") > -1) {
    // Create new stylesheet without the “wp-reset-editor-styles” styles
    // You can preview those styles using this URL
    // /wp-admin/load-styles.php?c=1&dir=ltr&load%5Bchunk_1%5D=wp-reset-editor-styles&ver=5.9.1
    let link = document.createElement("link");
    link.media = "all";
    link.rel = "stylesheet";
    link.type = "text/css";
    link.href = href.replace("wp-reset-editor-styles,", "");
    // Disable the original stylesheet on load
    link.onload = function () {
      tag.disabled = true;
    };
    // NOTE: We’re adding this stylehseet right after the original link
    //       tag to avoid specificity issues.
    tag.after(link);
  }
});
