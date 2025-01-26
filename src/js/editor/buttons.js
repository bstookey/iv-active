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
