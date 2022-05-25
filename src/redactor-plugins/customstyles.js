(function ($R) {
    $R.add('plugin', 'customstyles', {
        init(app) {
            this.app = app;
            this.buttons = app.opts.customStyles || app.opts.customstyles || {};
            this.defaultAddAfter =
                app.opts.customStylesDefaultAddAfter ||
                app.opts.customstylesdefaultaddafter ||
                'italic';
            this.customButtonIcons =
                app.opts.customButtonIcons || app.opts.custombuttonicons || {};
            this.icons = Craft.RedactorCustomStyles.icons;
        },

        start() {
            Object.entries(this.buttons)
                .reverse()
                .forEach(([key, config]) => {
                    if (config.dropdown !== undefined) {
                        this.addDropdown(key, config);
                    } else {
                        this.addButton(key, config);
                    }
                });

            Object.entries(this.customButtonIcons).forEach(([key, icon]) => {
                const button = this.app.toolbar.getButton(key);
                if (button) {
                    button.setIcon(this.getIconHtml(icon));
                }
            });
        },

        addButton(key, config) {
            const data = {
                title: Craft.t('redactor-custom-styles', config.title),
                icon: this.getIconHtml(config.icon || key),
                api: config.api || 'module.inline.format',
                args: config.args,
            };

            this.app.toolbar.addButtonAfter(
                config.addAfter || this.defaultAddAfter,
                key,
                data
            );
        },

        addDropdown(key, config) {
            const data = {
                title: Craft.t('redactor-custom-styles', config.title),
                icon: this.getIconHtml(config.icon || key),
                dropdown: {},
            };

            Object.entries(config.dropdown).forEach(([itemKey, itemConfig]) => {
                data.dropdown[itemKey] = {
                    title: Craft.t('redactor-custom-styles', itemConfig.title),
                    api: itemConfig.api || 'module.inline.format',
                    args: itemConfig.args,
                };
            });

            this.app.toolbar.addButtonAfter(
                config.addAfter || this.defaultAddAfter,
                key,
                data
            );
        },

        getIconHtml(icon) {
            return this.icons[icon] || null;
        },
    });
})(Redactor);
