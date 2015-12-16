# Redactor Inline Styles plugin for Craft

![Redactor Inline Styles](https://github.com/carlcs/craft-redactorinlinestyles/blob/master/redactorinlinestyles.png)

This Craft plugin makes it possible to add additional formatting buttons and dropdown lists to your Redactor editor toolbar. It provides a number of ready to use buttons to add the most commonly used text-level semantics to your content, e.g., `<q>`, `<code>` or `<mark>` elements.

Buttons and dropdowns can be customized via [Redactor config settings][1]. You should use them to make your editor formatting options match the styles available in your website or application. Regardless of the plugin name, it is also possible to configure formatting options to style block-level elements (Note: to customize the default Format dropdown, use Redactor's [`formattingAdd`][2] setting).

![Redactor Inline Styles](https://github.com/carlcs/craft-redactorinlinestyles/blob/master/redactorinlinestyles-1.png)

The plugin also allows to add icons to your default toolbar buttons, to make your Craft 2.5 Rich Text fields with Redactor II look like they always did (or even better!).


  [1]: http://buildwithcraft.com/docs/rich-text-fields#redactor-configs
  [2]: https://imperavi.com/redactor/docs/settings/formatting/#setting-formattingAdd

## Installation

To install the plugin, copy the redactorinlinestyles/ folder into craft/plugins/. Then go to Settings → Plugins and click the "Install" button next to "Redactor Inline Styles".

You also need to enable the plugin in your [Redactor config files][1] stored in craft/config/redactor/ and choose a config file with the Redactor Inline Styles plugin enabled in your Rich Text field's settings.

Add `'inlinestyles'` to the `plugins` setting:

```javascript
{
	"buttons": ["format","bold","italic","lists","file","image","link","horizontalrule"],
	"plugins": ["inlinestyles","source","video","table","fullscreen"],
	"toolbarFixed": false,
}
```

## Default config

Elements available without further plugin configuration:

- `<sup>`: Superscript
- `<sub>`: Subscript
- `<q>`: Quote
- `<cite>`: Source citation
- `<kbd>`: Keyboard input
- `<code>`: Code
- `<small>`: Small print
- `<del>`: Deleted
- `<ins>`: Inserted
- `<mark>`: Marked
- `<nobr>`: Prevent line-break

Note: The `<nobr>` tag is not standard HTML and should not be used. But as Redactor currently doesn't allow to add `<span>` tags at all, the plugin uses `<nobr>` that you should replace in your Template with `<span style="white-space: nowrap">`.

## Configuration

The plugin comes with some well documented [example configuration files][3]. Use them as a starting point for you own toolbar customization.

These settings are available to configure the plugin from your Redactor config files:

- `buttonsAdd`: Configuration of the additional buttons and dropdowns the plugin adds to your  toolbar.
- `buttonsAddAfter`: Sets the default position of all plugin buttons within the toolbar.
- `setIcons`: Allows to add icons to all of your toolbar buttons (default or plugin buttons).

It is also possible to configure the plugin with a redactorinlinestyles.php
[plugin configuration file][3]. In addition to the Redactor config settings listed above, the following settings are available:

- `iconsFile`: Configure a custom SVG sprite file with toolbar icons.
- `cssFile`: Configure a custom CSS file with custom toolbar and editor styles.


  [3]: examples/Example-1.json
  [4]: http://buildwithcraft.com/docs/plugins/plugin-settings#config-file

## Requirements

Redactor Inline Styles requires Craft 2.5 or above.

## Known Issues

- It's not possible to add `<span>` tags (Redactor bug).
