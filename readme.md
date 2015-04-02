# Redactor Inline Styles plugin for Craft

Adds additional buttons to apply inline styles to your Redactor toolbar in Craft.

## Installation

To install the plugin, copy the redactorinlinestyles/ folder into craft/plugins/. Then go to Settings → Plugins and click the "Install" button next to "Redactor Inline Styles".

You also need to enable the Redator plugin in your Redactor config files stored in craft/config/redactor/. Add `'inlinestyles'` to the `'plugins'` setting.

```json
{
  buttons: ['html','formatting','bold','italic','unorderedlist','orderedlist','link','image','video'],
  plugins: ['fullscreen','inlinestyles']
}
```

## Todo

- Make it possible to add each button individually
- Add more styles
