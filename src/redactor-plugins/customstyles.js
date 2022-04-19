(function($R) {
    $R.add('plugin', 'customstyles', {
        init: function(app) {
            this.app = app;
            this.lang = app.lang;
            this.opts = app.opts;
            this.toolbar = app.toolbar;

            this.buttons = this.opts.customStyles || this.opts.customstyles || {};
            this.defaultAddAfter = this.opts.customStylesDefaultAddAfter || this.opts.customstylesdefaultaddafter || 'italic';
            this.customButtonIcons = this.opts.customButtonIcons || this.opts.custombuttonicons || {};
            this.icons = Craft.RedactorCustomStyles.icons;
        },
        start: function() {
            // Add new buttons in reverse order, for expected sort order when
            // addAfter isn’t used.
            var keys = Object.keys(this.buttons).reverse();

            for (var i = 0; i < keys.length; i++) {
                var key = keys[i];
                var config = this.buttons[key];

                if (key.charAt(0) === '_') {
                    continue;
                }

                if ('dropdown' in config) {
                    this.addDropdown(key, config);
                } else {
                    this.addButton(key, config);
                }
            }

            // Override icons
            for (key in this.customButtonIcons) {
                var $button = this.toolbar.getButton(key);

                if ($button) {
                    var icon = this.customButtonIcons[key];
                    $button.setIcon(this.getIconHtml(icon));
                }
            }
        },
        addButton: function(key, config) {
            var data = {
                title: Craft.t('redactor-custom-styles', config.title),
                icon: this.getIconHtml(config.icon || key),
                api: config.api || 'module.inline.format',
                args: config.args,
            };

            this.toolbar.addButtonAfter(config.addAfter || this.defaultAddAfter, key, data);
        },
        addDropdown: function(key, config) {
            var data = {
                title: Craft.t('redactor-custom-styles', config.title),
                icon: this.getIconHtml(config.icon || key),
                dropdown: {},
            };

            for (var itemKey in config.dropdown) {
                var itemConfig = config.dropdown[itemKey];

                data.dropdown[itemKey] = {
                    title: Craft.t('redactor-custom-styles', itemConfig.title),
                    api: itemConfig.api || 'module.inline.format',
                    args: itemConfig.args,
                };
            }

            this.toolbar.addButtonAfter(config.addAfter || this.defaultAddAfter, key, data);
        },
        getIconHtml: function(icon) {
            return this.icons[icon] || null;
        },
    });
})(Redactor);
