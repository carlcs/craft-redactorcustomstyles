# Changelog

## 3.0.4 - 2020-08-10

### Changed
- Updated styles for Redactor plugin 2.7

## 3.0.3 - 2020-04-02

### Changed
- Updated styles for Craft 3.4

## 3.0.2 - 2018-06-07

### Fixed
- Fixed a JavaScript error that could occur when the Redactor plugin was used in Matrix fields.

## 3.0.1 - 2018-05-22

### Changed
- All plugin assets are now served with versioned URLs.
- Redactor plugin version 2.0.0 is now added to the Composer dependencies.

## 3.0.0 - 2018-05-16

### Added
- Added Craft 3 and Redactor 3 compatibility.
- Button configs now accept a `api` setting, which can be set to define the Redactor API to use.
- It is now possible to define icons for toolbar buttons added through the plugin.
- Icons for existing buttons can be overridden with the `customButtonIcons`

### Changed
- The plugin got renamed to Redactor Custom Styles.
- The Redactor plugin got renamed to `customstyles`.
- The Redactor config to define buttons got renamed to `customStyles`.
- The Redactor config to define the default position for buttons got renamed to `customStylesDefaultAddAfter`.
- The `args` setting for button configs is now directly passed to the Redactor API.
- Custom CSS files for the Control Panel are now automatically included from the config/redactor/resources/ folder. The path can be configured with the `resourcesPath` config setting.

### Removed
- Removed the `clear` setting for button configs. Use `"api": "module.inline.clearformat"` instead.

## 2.1.3 - 2017-02-23

### Changed
- Updated the example Redactor config files for Redactor II 2.0.

## 2.1.2 - 2016-07-15

### Changed
- Updated the example Redactor config files.

## 2.1.1 - 2016-07-12

### Changed
- Custom CSS files for the Control Panel are now automatically included from the craft/config/redactorinlinestyles/ folder.

## 2.1.0 - 2016-07-11

### Changed
- It is no longer possible to configure icons for toolbar buttons, the feature is now available in a separate plugin [Redactor Icon Buttons](https://github.com/carlcs/craft-redactoriconbuttons).
- The `buttonsAdd` setting now allows to explicitly set the buttons’ indexes, this allows to use the same syntax in `buttonsAdd` and in `formattingAdd`.
- The plugin no longer comes with pre-configued default buttons. Please use the provided example files as a starting point instead.
- `buttonsAdd` and `buttonsAddAfter` as settings in redactorinlinestyles.php config files are now deprecated.
- Custom CSS files for the Control Panel are now automatically included from the craft/config/cp/ folder. The `cssFile` config setting is now deprecated.
- The plugin now requires PHP 5.4+.

## 2.0.5 - 2016-07-05

### Changed
- The plugin now uses a different Redactor API to apply attributes to tags, `inline.format` now seems to work reliably to apply them (Redactor 1.2.5).
- Prevent line-breaks button now uses `<span>` tags again, now that Redactor doesn’t strip them any longer (Redactor 1.2.5).

## 2.0.4 - 2016-03-09

### Fixed
- Fixed a Javascript error that occurred in Craft 2.6 when the Redactor config file had arrays with NULL values in it (e.g., caused by a trailing comma).

### Changed
- Updated JSON config files in the examples folder, removed trailing commas.

## 2.0.3 - 2016-02-02

### Added
- Added Composer support.

## 2.0.2 - 2015-12-15

### Added
- Added tooltips to icon buttons.
- Added a color dropdown to the Example-1 configuration.

### Changed
- The plugin's default configuration now uses the new textual style buttons. Removed the media query to show icons for smaller viewport widths.
- Disabled button active state styles, they only worked for `<strong>` and `<em>` buttons.

## 2.0.1 - 2015-11-20

### Changed
- Dropdown styles for default and example configs updated for Redactor II 1.1.

### Fixed
- Prevent line-breaks button now uses `<nobr>` tags, it's currently not possible to add `<span>` tags.
- Fixed the editor styles for `<kbd>` and `<nobr>`.

## 2.0 - 2015-11-17

### Added
- Added Craft 2.5 plugin configurations.
- It's now possible to configure the buttons and dropdowns the plugin adds to the toolbar, this replaces the now deprecated `buttonsInlineStyles` config setting.
- It's now possible to add icons to any toolbar button.
- Added a button to remove all inline styles.
- Added two new buttons: `<cite>` and `<kbd>`.
- Toolbar icons and the editor styles can now be customized with the `iconsFile` and `cssFile` config setting.

### Changed
- Toolbar icons are now implemented with SVG.

## 1.2 - 2015-05-19

### Added
- Added a Prevent line-breaks button.

## 1.1 - 2015-04-04

### Added
- New button icons.

## 1.0 - 2015-04-02

- First release
