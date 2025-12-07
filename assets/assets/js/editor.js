/******/ (function() { // webpackBootstrap
/*!*********************************!*\
  !*** ./src/js/editor/editor.js ***!
  \*********************************/
function ownKeys(e, r) { var t = Object.keys(e); if (Object.getOwnPropertySymbols) { var o = Object.getOwnPropertySymbols(e); r && (o = o.filter(function (r) { return Object.getOwnPropertyDescriptor(e, r).enumerable; })), t.push.apply(t, o); } return t; }
function _objectSpread(e) { for (var r = 1; r < arguments.length; r++) { var t = null != arguments[r] ? arguments[r] : {}; r % 2 ? ownKeys(Object(t), !0).forEach(function (r) { _defineProperty(e, r, t[r]); }) : Object.getOwnPropertyDescriptors ? Object.defineProperties(e, Object.getOwnPropertyDescriptors(t)) : ownKeys(Object(t)).forEach(function (r) { Object.defineProperty(e, r, Object.getOwnPropertyDescriptor(t, r)); }); } return e; }
function _defineProperty(e, r, t) { return (r = _toPropertyKey(r)) in e ? Object.defineProperty(e, r, { value: t, enumerable: !0, configurable: !0, writable: !0 }) : e[r] = t, e; }
function _toPropertyKey(t) { var i = _toPrimitive(t, "string"); return "symbol" == typeof i ? i : i + ""; }
function _toPrimitive(t, r) { if ("object" != typeof t || !t) return t; var e = t[Symbol.toPrimitive]; if (void 0 !== e) { var i = e.call(t, r || "default"); if ("object" != typeof i) return i; throw new TypeError("@@toPrimitive must return a primitive value."); } return ("string" === r ? String : Number)(t); }
// Core buttons custom settings

const {
  addFilter
} = wp.hooks;
const {
  createHigherOrderComponent
} = wp.compose;
const {
  Fragment
} = wp.element;
const {
  InspectorControls
} = wp.blockEditor;
const {
  PanelBody,
  ToggleControl
} = wp.components;
const {
  registerBlockType
} = wp.blocks;

// Step 1: Add a custom attribute to the button block
const addCustomButtonAttribute = (settings, name) => {
  if (name === "core/buttons") {
    settings.attributes = _objectSpread(_objectSpread({}, settings.attributes), {}, {
      isCustomToggleEnabled: {
        type: "boolean",
        default: false
      }
    });
  }
  return settings;
};
addFilter("blocks.registerBlockType", "custom/buttons-block/add-custom-attribute", addCustomButtonAttribute);

// Step 2: Add the toggle control to the block's inspector controls
const withCustomButtonSettings = createHigherOrderComponent(BlockEdit => {
  return props => {
    const {
      attributes,
      setAttributes,
      name
    } = props;
    if (name === "core/buttons") {
      return /*#__PURE__*/React.createElement(Fragment, null, /*#__PURE__*/React.createElement(BlockEdit, props), /*#__PURE__*/React.createElement(InspectorControls, null, /*#__PURE__*/React.createElement(PanelBody, {
        title: "Custom Settings",
        initialOpen: true
      }, /*#__PURE__*/React.createElement(ToggleControl, {
        label: "On Dark Background",
        checked: attributes.isCustomToggleEnabled,
        onChange: value => setAttributes({
          isCustomToggleEnabled: value
        })
      }))));
    }
    return /*#__PURE__*/React.createElement(BlockEdit, props);
  };
}, "withCustomButtonSettings");
addFilter("editor.BlockEdit", "custom/buttons-block/with-custom-settings", withCustomButtonSettings);

// Step 3: Save the custom attribute in the block's output
const saveCustomButtonAttribute = (element, blockType, attributes) => {
  if (blockType.name === "core/buttons" && attributes.isCustomToggleEnabled) {
    return wp.element.cloneElement(element, _objectSpread(_objectSpread({}, element.props), {}, {
      className: "".concat(element.props.className || "", " on-dark-background")
    }));
  }
  return element;
};
addFilter("blocks.getSaveElement", "custom/button-block/save-custom-attribute", saveCustomButtonAttribute);

// Core Group custom settings

// Step 1: Add a custom attribute to the button block
const addCustomGroupAttribute = (settings, name) => {
  if (name === "core/group") {
    settings.attributes = _objectSpread(_objectSpread({}, settings.attributes), {}, {
      isCustomToggleEnabled: {
        type: "boolean",
        default: false
      }
    });
  }
  return settings;
};
addFilter("blocks.registerBlockType", "custom/group-block/add-custom-attribute", addCustomGroupAttribute);

// Step 2: Add the toggle control to the block's inspector controls
const withCustomGroupSettings = createHigherOrderComponent(BlockEdit => {
  return props => {
    const {
      attributes,
      setAttributes,
      name
    } = props;
    if (name === "core/group") {
      return /*#__PURE__*/React.createElement(Fragment, null, /*#__PURE__*/React.createElement(BlockEdit, props), /*#__PURE__*/React.createElement(InspectorControls, null, /*#__PURE__*/React.createElement(PanelBody, {
        title: "Custom Settings",
        initialOpen: true
      }, /*#__PURE__*/React.createElement(ToggleControl, {
        label: "Rounded Corners",
        checked: attributes.isCustomToggleEnabled,
        onChange: value => setAttributes({
          isCustomToggleEnabled: value
        })
      }))));
    }
    return /*#__PURE__*/React.createElement(BlockEdit, props);
  };
}, "withCustomGroupSettings");
addFilter("editor.BlockEdit", "custom/group-block/with-custom-settings", withCustomGroupSettings);

// Step 3: Save the custom attribute in the block's output
const saveCustomGroupAttribute = (element, blockType, attributes) => {
  if (blockType.name === "core/group" && attributes.isCustomToggleEnabled) {
    return wp.element.cloneElement(element, _objectSpread(_objectSpread({}, element.props), {}, {
      className: "".concat(element.props.className || "", " has-rounded-default")
    }));
  }
  return element;
};
addFilter("blocks.getSaveElement", "custom/group-block/save-custom-attribute", saveCustomGroupAttribute);

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
linkTags.forEach(tag => {
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
/******/ })()
;
//# sourceMappingURL=data:application/json;charset=utf-8;base64,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LENBQUNoQixhQUFhLENBQUMsTUFBTSxDQUFDO0lBQ3pDdUIsSUFBSSxDQUFDQyxLQUFLLEdBQUcsS0FBSztJQUNsQkQsSUFBSSxDQUFDRSxHQUFHLEdBQUcsWUFBWTtJQUN2QkYsSUFBSSxDQUFDOUIsSUFBSSxHQUFHLFVBQVU7SUFDdEI4QixJQUFJLENBQUNILElBQUksR0FBR0EsSUFBSSxDQUFDTSxPQUFPLENBQUMseUJBQXlCLEVBQUUsRUFBRSxDQUFDO0lBQ3ZEO0lBQ0FILElBQUksQ0FBQ0ksTUFBTSxHQUFHLFlBQVk7TUFDeEJSLEdBQUcsQ0FBQ1MsUUFBUSxHQUFHLElBQUk7SUFDckIsQ0FBQztJQUNEO0lBQ0E7SUFDQVQsR0FBRyxDQUFDVSxLQUFLLENBQUNOLElBQUksQ0FBQztFQUNqQjtBQUNGLENBQUMsQ0FBQyxDIiwic291cmNlcyI6WyJ3ZWJwYWNrOi8vaGFwcHl0YXBpci8uL3NyYy9qcy9lZGl0b3IvZWRpdG9yLmpzIl0sInNvdXJjZXNDb250ZW50IjpbIi8vIENvcmUgYnV0dG9ucyBjdXN0b20gc2V0dGluZ3NcblxuY29uc3QgeyBhZGRGaWx0ZXIgfSA9IHdwLmhvb2tzO1xuY29uc3QgeyBjcmVhdGVIaWdoZXJPcmRlckNvbXBvbmVudCB9ID0gd3AuY29tcG9zZTtcbmNvbnN0IHsgRnJhZ21lbnQgfSA9IHdwLmVsZW1lbnQ7XG5jb25zdCB7IEluc3BlY3RvckNvbnRyb2xzIH0gPSB3cC5ibG9ja0VkaXRvcjtcbmNvbnN0IHsgUGFuZWxCb2R5LCBUb2dnbGVDb250cm9sIH0gPSB3cC5jb21wb25lbnRzO1xuY29uc3QgeyByZWdpc3RlckJsb2NrVHlwZSB9ID0gd3AuYmxvY2tzO1xuXG4vLyBTdGVwIDE6IEFkZCBhIGN1c3RvbSBhdHRyaWJ1dGUgdG8gdGhlIGJ1dHRvbiBibG9ja1xuY29uc3QgYWRkQ3VzdG9tQnV0dG9uQXR0cmlidXRlID0gKHNldHRpbmdzLCBuYW1lKSA9PiB7XG4gIGlmIChuYW1lID09PSBcImNvcmUvYnV0dG9uc1wiKSB7XG4gICAgc2V0dGluZ3MuYXR0cmlidXRlcyA9IHtcbiAgICAgIC4uLnNldHRpbmdzLmF0dHJpYnV0ZXMsXG4gICAgICBpc0N1c3RvbVRvZ2dsZUVuYWJsZWQ6IHtcbiAgICAgICAgdHlwZTogXCJib29sZWFuXCIsXG4gICAgICAgIGRlZmF1bHQ6IGZhbHNlLFxuICAgICAgfSxcbiAgICB9O1xuICB9XG4gIHJldHVybiBzZXR0aW5ncztcbn07XG5cbmFkZEZpbHRlcihcbiAgXCJibG9ja3MucmVnaXN0ZXJCbG9ja1R5cGVcIixcbiAgXCJjdXN0b20vYnV0dG9ucy1ibG9jay9hZGQtY3VzdG9tLWF0dHJpYnV0ZVwiLFxuICBhZGRDdXN0b21CdXR0b25BdHRyaWJ1dGVcbik7XG5cbi8vIFN0ZXAgMjogQWRkIHRoZSB0b2dnbGUgY29udHJvbCB0byB0aGUgYmxvY2sncyBpbnNwZWN0b3IgY29udHJvbHNcbmNvbnN0IHdpdGhDdXN0b21CdXR0b25TZXR0aW5ncyA9IGNyZWF0ZUhpZ2hlck9yZGVyQ29tcG9uZW50KChCbG9ja0VkaXQpID0+IHtcbiAgcmV0dXJuIChwcm9wcykgPT4ge1xuICAgIGNvbnN0IHsgYXR0cmlidXRlcywgc2V0QXR0cmlidXRlcywgbmFtZSB9ID0gcHJvcHM7XG5cbiAgICBpZiAobmFtZSA9PT0gXCJjb3JlL2J1dHRvbnNcIikge1xuICAgICAgcmV0dXJuIChcbiAgICAgICAgPEZyYWdtZW50PlxuICAgICAgICAgIDxCbG9ja0VkaXQgey4uLnByb3BzfSAvPlxuICAgICAgICAgIDxJbnNwZWN0b3JDb250cm9scz5cbiAgICAgICAgICAgIDxQYW5lbEJvZHkgdGl0bGU9XCJDdXN0b20gU2V0dGluZ3NcIiBpbml0aWFsT3Blbj17dHJ1ZX0+XG4gICAgICAgICAgICAgIDxUb2dnbGVDb250cm9sXG4gICAgICAgICAgICAgICAgbGFiZWw9XCJPbiBEYXJrIEJhY2tncm91bmRcIlxuICAgICAgICAgICAgICAgIGNoZWNrZWQ9e2F0dHJpYnV0ZXMuaXNDdXN0b21Ub2dnbGVFbmFibGVkfVxuICAgICAgICAgICAgICAgIG9uQ2hhbmdlPXsodmFsdWUpID0+XG4gICAgICAgICAgICAgICAgICBzZXRBdHRyaWJ1dGVzKHsgaXNDdXN0b21Ub2dnbGVFbmFibGVkOiB2YWx1ZSB9KVxuICAgICAgICAgICAgICAgIH1cbiAgICAgICAgICAgICAgLz5cbiAgICAgICAgICAgIDwvUGFuZWxCb2R5PlxuICAgICAgICAgIDwvSW5zcGVjdG9yQ29udHJvbHM+XG4gICAgICAgIDwvRnJhZ21lbnQ+XG4gICAgICApO1xuICAgIH1cblxuICAgIHJldHVybiA8QmxvY2tFZGl0IHsuLi5wcm9wc30gLz47XG4gIH07XG59LCBcIndpdGhDdXN0b21CdXR0b25TZXR0aW5nc1wiKTtcbmFkZEZpbHRlcihcbiAgXCJlZGl0b3IuQmxvY2tFZGl0XCIsXG4gIFwiY3VzdG9tL2J1dHRvbnMtYmxvY2svd2l0aC1jdXN0b20tc2V0dGluZ3NcIixcbiAgd2l0aEN1c3RvbUJ1dHRvblNldHRpbmdzXG4pO1xuXG4vLyBTdGVwIDM6IFNhdmUgdGhlIGN1c3RvbSBhdHRyaWJ1dGUgaW4gdGhlIGJsb2NrJ3Mgb3V0cHV0XG5jb25zdCBzYXZlQ3VzdG9tQnV0dG9uQXR0cmlidXRlID0gKGVsZW1lbnQsIGJsb2NrVHlwZSwgYXR0cmlidXRlcykgPT4ge1xuICBpZiAoYmxvY2tUeXBlLm5hbWUgPT09IFwiY29yZS9idXR0b25zXCIgJiYgYXR0cmlidXRlcy5pc0N1c3RvbVRvZ2dsZUVuYWJsZWQpIHtcbiAgICByZXR1cm4gd3AuZWxlbWVudC5jbG9uZUVsZW1lbnQoZWxlbWVudCwge1xuICAgICAgLi4uZWxlbWVudC5wcm9wcyxcbiAgICAgIGNsYXNzTmFtZTogYCR7ZWxlbWVudC5wcm9wcy5jbGFzc05hbWUgfHwgXCJcIn0gb24tZGFyay1iYWNrZ3JvdW5kYCxcbiAgICB9KTtcbiAgfVxuICByZXR1cm4gZWxlbWVudDtcbn07XG5hZGRGaWx0ZXIoXG4gIFwiYmxvY2tzLmdldFNhdmVFbGVtZW50XCIsXG4gIFwiY3VzdG9tL2J1dHRvbi1ibG9jay9zYXZlLWN1c3RvbS1hdHRyaWJ1dGVcIixcbiAgc2F2ZUN1c3RvbUJ1dHRvbkF0dHJpYnV0ZVxuKTtcblxuLy8gQ29yZSBHcm91cCBjdXN0b20gc2V0dGluZ3NcblxuLy8gU3RlcCAxOiBBZGQgYSBjdXN0b20gYXR0cmlidXRlIHRvIHRoZSBidXR0b24gYmxvY2tcbmNvbnN0IGFkZEN1c3RvbUdyb3VwQXR0cmlidXRlID0gKHNldHRpbmdzLCBuYW1lKSA9PiB7XG4gIGlmIChuYW1lID09PSBcImNvcmUvZ3JvdXBcIikge1xuICAgIHNldHRpbmdzLmF0dHJpYnV0ZXMgPSB7XG4gICAgICAuLi5zZXR0aW5ncy5hdHRyaWJ1dGVzLFxuICAgICAgaXNDdXN0b21Ub2dnbGVFbmFibGVkOiB7XG4gICAgICAgIHR5cGU6IFwiYm9vbGVhblwiLFxuICAgICAgICBkZWZhdWx0OiBmYWxzZSxcbiAgICAgIH0sXG4gICAgfTtcbiAgfVxuICByZXR1cm4gc2V0dGluZ3M7XG59O1xuXG5hZGRGaWx0ZXIoXG4gIFwiYmxvY2tzLnJlZ2lzdGVyQmxvY2tUeXBlXCIsXG4gIFwiY3VzdG9tL2dyb3VwLWJsb2NrL2FkZC1jdXN0b20tYXR0cmlidXRlXCIsXG4gIGFkZEN1c3RvbUdyb3VwQXR0cmlidXRlXG4pO1xuXG4vLyBTdGVwIDI6IEFkZCB0aGUgdG9nZ2xlIGNvbnRyb2wgdG8gdGhlIGJsb2NrJ3MgaW5zcGVjdG9yIGNvbnRyb2xzXG5jb25zdCB3aXRoQ3VzdG9tR3JvdXBTZXR0aW5ncyA9IGNyZWF0ZUhpZ2hlck9yZGVyQ29tcG9uZW50KChCbG9ja0VkaXQpID0+IHtcbiAgcmV0dXJuIChwcm9wcykgPT4ge1xuICAgIGNvbnN0IHsgYXR0cmlidXRlcywgc2V0QXR0cmlidXRlcywgbmFtZSB9ID0gcHJvcHM7XG5cbiAgICBpZiAobmFtZSA9PT0gXCJjb3JlL2dyb3VwXCIpIHtcbiAgICAgIHJldHVybiAoXG4gICAgICAgIDxGcmFnbWVudD5cbiAgICAgICAgICA8QmxvY2tFZGl0IHsuLi5wcm9wc30gLz5cbiAgICAgICAgICA8SW5zcGVjdG9yQ29udHJvbHM+XG4gICAgICAgICAgICA8UGFuZWxCb2R5IHRpdGxlPVwiQ3VzdG9tIFNldHRpbmdzXCIgaW5pdGlhbE9wZW49e3RydWV9PlxuICAgICAgICAgICAgICA8VG9nZ2xlQ29udHJvbFxuICAgICAgICAgICAgICAgIGxhYmVsPVwiUm91bmRlZCBDb3JuZXJzXCJcbiAgICAgICAgICAgICAgICBjaGVja2VkPXthdHRyaWJ1dGVzLmlzQ3VzdG9tVG9nZ2xlRW5hYmxlZH1cbiAgICAgICAgICAgICAgICBvbkNoYW5nZT17KHZhbHVlKSA9PlxuICAgICAgICAgICAgICAgICAgc2V0QXR0cmlidXRlcyh7IGlzQ3VzdG9tVG9nZ2xlRW5hYmxlZDogdmFsdWUgfSlcbiAgICAgICAgICAgICAgICB9XG4gICAgICAgICAgICAgIC8+XG4gICAgICAgICAgICA8L1BhbmVsQm9keT5cbiAgICAgICAgICA8L0luc3BlY3RvckNvbnRyb2xzPlxuICAgICAgICA8L0ZyYWdtZW50PlxuICAgICAgKTtcbiAgICB9XG5cbiAgICByZXR1cm4gPEJsb2NrRWRpdCB7Li4ucHJvcHN9IC8+O1xuICB9O1xufSwgXCJ3aXRoQ3VzdG9tR3JvdXBTZXR0aW5nc1wiKTtcbmFkZEZpbHRlcihcbiAgXCJlZGl0b3IuQmxvY2tFZGl0XCIsXG4gIFwiY3VzdG9tL2dyb3VwLWJsb2NrL3dpdGgtY3VzdG9tLXNldHRpbmdzXCIsXG4gIHdpdGhDdXN0b21Hcm91cFNldHRpbmdzXG4pO1xuXG4vLyBTdGVwIDM6IFNhdmUgdGhlIGN1c3RvbSBhdHRyaWJ1dGUgaW4gdGhlIGJsb2NrJ3Mgb3V0cHV0XG5jb25zdCBzYXZlQ3VzdG9tR3JvdXBBdHRyaWJ1dGUgPSAoZWxlbWVudCwgYmxvY2tUeXBlLCBhdHRyaWJ1dGVzKSA9PiB7XG4gIGlmIChibG9ja1R5cGUubmFtZSA9PT0gXCJjb3JlL2dyb3VwXCIgJiYgYXR0cmlidXRlcy5pc0N1c3RvbVRvZ2dsZUVuYWJsZWQpIHtcbiAgICByZXR1cm4gd3AuZWxlbWVudC5jbG9uZUVsZW1lbnQoZWxlbWVudCwge1xuICAgICAgLi4uZWxlbWVudC5wcm9wcyxcbiAgICAgIGNsYXNzTmFtZTogYCR7ZWxlbWVudC5wcm9wcy5jbGFzc05hbWUgfHwgXCJcIn0gaGFzLXJvdW5kZWQtZGVmYXVsdGAsXG4gICAgfSk7XG4gIH1cbiAgcmV0dXJuIGVsZW1lbnQ7XG59O1xuYWRkRmlsdGVyKFxuICBcImJsb2Nrcy5nZXRTYXZlRWxlbWVudFwiLFxuICBcImN1c3RvbS9ncm91cC1ibG9jay9zYXZlLWN1c3RvbS1hdHRyaWJ1dGVcIixcbiAgc2F2ZUN1c3RvbUdyb3VwQXR0cmlidXRlXG4pO1xuXG4vLyBSZW1vdmUgV1AgcmVzZXQgc3R5bGVzIGZyb20gdGhlIGR5bmFtaWNhbGx5LWdlbmVyYXRlZCBhZG1pbiBzdHlsZXNoZWV0LCBsb2FkLXN0eWxlcy5waHAgKFdQIDUuOClcbi8vXG4vLyBOb3RlOiBUaGUgaHJlZiBjb250YWlucyBhbGwgb2YgdGhlIGluZGl2aWR1YWwgcGFydGlhbHMgdGhhdCBhcmUgY29uY2F0ZW5hdGVkIGludG8gYSBzaW5nbGUgQ1NTIGZpbGUuXG4vLyAgICAgICBBbGwgd2UgaGF2ZSB0byBkbyBpcyByZW1vdmUg4oCcd3AtcmVzZXQtZWRpdG9yLXN0eWxlc+KAnSBmcm9tIHRoZSBocmVmLiBIb3dldmVyLCB1cGRhdGluZyB0aGVcbi8vICAgICAgIGhyZWYgd2lsbCBjYXVzZSBhIGxvbmcgRk9VQywgc28gd2XigJlyZSBhZGRpbmcgYSBuZXcgc3R5bGVzaGVldCBhbmQgdGhlbiBkaXNhYmxpbmdcbi8vICAgICAgIHRoZSBvcmlnaW5hbCBvbmNlIHRoZSBuZXcgb25lIGhhcyBsb2FkZWQuXG4vL1xuLy8gTm90ZTogV2UgY2FuIGlnbm9yZSA8bGluaz4gdGFncyB3aXRoIElEcyBzaW5jZSB0aGlzIG9uZSBkb2VzbuKAmXQgaGF2ZSBvbmUuXG5sZXQgbGlua1RhZ3MgPSBkb2N1bWVudC5xdWVyeVNlbGVjdG9yQWxsKCdsaW5rW3JlbD1cInN0eWxlc2hlZXRcIl06bm90KFtpZF0pJyk7XG4vLyBUaGVyZSBzaG91bGQgb25seSBiZSBvbmUgbWF0Y2hpbmcgbGluayB0YWcgYnV0IHdl4oCZcmUgdXNpbmcgZm9yRWFjaCgpIGp1c3QgdG8gYmUgc2FmZS5cbmxpbmtUYWdzLmZvckVhY2goKHRhZykgPT4ge1xuICBsZXQgaHJlZiA9IHRhZy5nZXRBdHRyaWJ1dGUoXCJocmVmXCIpO1xuICBpZiAoaHJlZi5pbmRleE9mKFwibG9hZC1zdHlsZXMucGhwXCIpID4gLTEpIHtcbiAgICAvLyBDcmVhdGUgbmV3IHN0eWxlc2hlZXQgd2l0aG91dCB0aGUg4oCcd3AtcmVzZXQtZWRpdG9yLXN0eWxlc+KAnSBzdHlsZXNcbiAgICAvLyBZb3UgY2FuIHByZXZpZXcgdGhvc2Ugc3R5bGVzIHVzaW5nIHRoaXMgVVJMXG4gICAgLy8gL3dwLWFkbWluL2xvYWQtc3R5bGVzLnBocD9jPTEmZGlyPWx0ciZsb2FkJTVCY2h1bmtfMSU1RD13cC1yZXNldC1lZGl0b3Itc3R5bGVzJnZlcj01LjkuMVxuICAgIGxldCBsaW5rID0gZG9jdW1lbnQuY3JlYXRlRWxlbWVudChcImxpbmtcIik7XG4gICAgbGluay5tZWRpYSA9IFwiYWxsXCI7XG4gICAgbGluay5yZWwgPSBcInN0eWxlc2hlZXRcIjtcbiAgICBsaW5rLnR5cGUgPSBcInRleHQvY3NzXCI7XG4gICAgbGluay5ocmVmID0gaHJlZi5yZXBsYWNlKFwid3AtcmVzZXQtZWRpdG9yLXN0eWxlcyxcIiwgXCJcIik7XG4gICAgLy8gRGlzYWJsZSB0aGUgb3JpZ2luYWwgc3R5bGVzaGVldCBvbiBsb2FkXG4gICAgbGluay5vbmxvYWQgPSBmdW5jdGlvbiAoKSB7XG4gICAgICB0YWcuZGlzYWJsZWQgPSB0cnVlO1xuICAgIH07XG4gICAgLy8gTk9URTogV2XigJlyZSBhZGRpbmcgdGhpcyBzdHlsZWhzZWV0IHJpZ2h0IGFmdGVyIHRoZSBvcmlnaW5hbCBsaW5rXG4gICAgLy8gICAgICAgdGFnIHRvIGF2b2lkIHNwZWNpZmljaXR5IGlzc3Vlcy5cbiAgICB0YWcuYWZ0ZXIobGluayk7XG4gIH1cbn0pO1xuIl0sIm5hbWVzIjpbImFkZEZpbHRlciIsIndwIiwiaG9va3MiLCJjcmVhdGVIaWdoZXJPcmRlckNvbXBvbmVudCIsImNvbXBvc2UiLCJGcmFnbWVudCIsImVsZW1lbnQiLCJJbnNwZWN0b3JDb250cm9scyIsImJsb2NrRWRpdG9yIiwiUGFuZWxCb2R5IiwiVG9nZ2xlQ29udHJvbCIsImNvbXBvbmVudHMiLCJyZWdpc3RlckJsb2NrVHlwZSIsImJsb2NrcyIsImFkZEN1c3RvbUJ1dHRvbkF0dHJpYnV0ZSIsInNldHRpbmdzIiwibmFtZSIsImF0dHJpYnV0ZXMiLCJfb2JqZWN0U3ByZWFkIiwiaXNDdXN0b21Ub2dnbGVFbmFibGVkIiwidHlwZSIsImRlZmF1bHQiLCJ3aXRoQ3VzdG9tQnV0dG9uU2V0dGluZ3MiLCJCbG9ja0VkaXQiLCJwcm9wcyIsInNldEF0dHJpYnV0ZXMiLCJSZWFjdCIsImNyZWF0ZUVsZW1lbnQiLCJ0aXRsZSIsImluaXRpYWxPcGVuIiwibGFiZWwiLCJjaGVja2VkIiwib25DaGFuZ2UiLCJ2YWx1ZSIsInNhdmVDdXN0b21CdXR0b25BdHRyaWJ1dGUiLCJibG9ja1R5cGUiLCJjbG9uZUVsZW1lbnQiLCJjbGFzc05hbWUiLCJjb25jYXQiLCJhZGRDdXN0b21Hcm91cEF0dHJpYnV0ZSIsIndpdGhDdXN0b21Hcm91cFNldHRpbmdzIiwic2F2ZUN1c3RvbUdyb3VwQXR0cmlidXRlIiwibGlua1RhZ3MiLCJkb2N1bWVudCIsInF1ZXJ5U2VsZWN0b3JBbGwiLCJmb3JFYWNoIiwidGFnIiwiaHJlZiIsImdldEF0dHJpYnV0ZSIsImluZGV4T2YiLCJsaW5rIiwibWVkaWEiLCJyZWwiLCJyZXBsYWNlIiwib25sb2FkIiwiZGlzYWJsZWQiLCJhZnRlciJdLCJzb3VyY2VSb290IjoiIn0=