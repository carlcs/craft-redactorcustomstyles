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
                title: config.title || this.getTitleFromKey(key),
                icon: this.getIconHtml(config.icon || key),
                api: config.api || 'module.inline.format',
                args: config.args,
            };

            this.toolbar.addButtonAfter(config.addAfter || this.defaultAddAfter, key, data);
        },
        addDropdown: function(key, config) {
            var data = {
                title: config.title || this.getTitleFromKey(key),
                icon: this.getIconHtml(config.icon || key),
                dropdown: {},
            };

            for (var itemKey in config.dropdown) {
                var itemConfig = config.dropdown[itemKey];

                data.dropdown[itemKey] = {
                    title: itemConfig.title || this.getTitleFromKey(itemKey),
                    api: itemConfig.api || 'module.inline.format',
                    args: itemConfig.args,
                };
            }

            this.toolbar.addButtonAfter(config.addAfter || this.defaultAddAfter, key, data);
        },
        getTitleFromKey: function(str) {
            str = str.replace(/([A-Z])/g, ' $1').trim();
            return str.charAt(0).toUpperCase()+str.slice(1);
        },
        getIconHtml: function(icon) {
            icon = icon.toLowerCase();

            if (icon.substring(0, 1) == '<') {
                return icon;
            }

            return this.icons[icon] || null;
        },
    });
})(Redactor);
