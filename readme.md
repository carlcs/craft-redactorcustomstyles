# Redactor Inline Styles plugin for Craft

![Redactor Inline Styles](https://github.com/carlcs/craft-redactorinlinestyles/blob/master/redactorinlinestyles.png)

Adds additional buttons to apply inline styles to your Redactor toolbar in Craft.

## Installation

To install the plugin, copy the redactorinlinestyles/ folder into craft/plugins/. Then go to Settings → Plugins and click the "Install" button next to "Redactor Inline Styles".

You also need to enable the Redator plugin in your Redactor config files stored in craft/config/redactor/. Add `'inlinestyles'` to the `plugins` setting.

```javascript
{
  buttons: ['html','formatting','bold','italic','unorderedlist','orderedlist','link','image','video'],
  plugins: ['fullscreen','inlinestyles']
}
```

## Settings

By default all of the plugin's buttons will be added to your toolbar. But this can be changed by adding a `buttonsInlineStyles` setting to your Redactor config files.

```javascript
{
  buttons: ['formatting','bold','italic'],
  buttonsInlineStyles: ['code','mark'],
  plugins: ['inlinestyles']
}
```

The following inline styles are available for configuration:

- <code>'ins'</code> Inserted text
- <code>'q'</code> Quote
- <code>'sup'</code> Superscript
- <code>'sub'</code> Subscript
- <code>'small'</code> Small print
- <code>'mark'</code> Marked / highlighted text
- <code>'code'</code> Code</dl>

## Todo

- ~~Make it possible to add each button individually~~
- ~~Add more styles~~
- Make buttons look better
