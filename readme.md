# Redactor Inline Styles plugin for Craft CMS

![Redactor Inline Styles](https://github.com/carlcs/craft-redactorinlinestyles/blob/master/resources/screenshot.png)

Redactor Inline Styles makes it possible to add additional formatting buttons and dropdown lists to your Redactor editor toolbar in Craft CMS.

## Installation

The plugin is available on Packagist and can be installed using Composer. You can also download the [latest release][0] and copy the files into craft/plugins/redactorinlinestyles/.

```
$ composer require carlcs/craft-redactorinlinestyles
```

Enable the plugin in your [Redactor config files][1] stored in craft/config/redactor/ by adding `inlinestyles` to the `plugins` setting. Make sure you have a config file in your Redactor field settings selected where the plugin is enabled.

## Configuration

Redactor Inline Styles comes with [example configuration files][2]. Use them as a starting point for your own editor and toolbar customizations.

#### Redactor Config Settings

Buttons and dropdowns can be configured via [Redactor config settings][1]. Configure them to make your editor formatting options match the styles available in your website or application. Note that it is also possible to configure formatting options to style block-level elements (regardless of the plugin name).

- **`buttonsAdd`** (required) – Adds additional buttons to your toolbar. The setting accepts a similar syntax to configure formatting options as the [`formattingAdd`][3] setting uses for the Format dropdown. Please refer to the [example files][2] for more detailed documentation.
- **`buttonsAddAfter`** (default `italic`) – Sets the default position of Redactor Inline Styles buttons in the toolbar.

```javascript
{
  "buttons": ["format","bold","italic","lists","link","horizontalrule"],
  "plugins": ["fullscreen","inlinestyles"],
  "buttonsAdd": {
    "deleted": {
      "title": "Deleted",
      "args": ["del"]
    },
    "inserted": {
      "title": "Inserted",
      "args": ["ins"]
    },
    "marked": {
      "title": "Marked",
      "args": ["mark","class","marked-blue"]
    }
  }
}
```

#### Control Panel Stylesheets

To make the text you are formatting with your custom buttons look good in your editor, Redactor Inline Styles provides an easy way to include stylesheets with Control Panel pages.

Create a folder craft/config/cp/, add your CSS files to it and they will be included automatically.

## Requirements

- PHP 5.4 or later
- Craft CMS 2.5 (including Redactor II) or later


  [0]: https://github.com/carlcs/craft-redactorinlinestyles/releases/latest
  [1]: https://craftcms.com/docs/rich-text-fields#redactor-configs
  [2]: _examples/
  [3]: https://imperavi.com/redactor/docs/settings/formatting/#setting-formattingAdd
