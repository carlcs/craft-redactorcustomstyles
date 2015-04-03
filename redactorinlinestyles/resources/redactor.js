if (!RedactorPlugins) var RedactorPlugins = {};

RedactorPlugins.inlinestyles = function()
{
	return {

		init: function ()
		{
			// Get the list of buttons from the config file.
			var buttonsInlineStyles = this.opts.buttonsInlineStyles;

			if (typeof buttonsInlineStyles == 'undefined')
			{
				buttonsInlineStyles = ['ins', 'q', 'sup', 'sub', 'small', 'mark', 'code'];
			}

			buttonsInlineStyles.reverse();

			// Set the position it the toolbar the buttons get added.
			var buttons = this.opts.buttons;

			var addAfterButtons = ['formatting', 'bold', 'italic', 'deleted', 'underline'];
			var addAfterIndex = 0;

			for (var i = 0; i < addAfterButtons.length; i++)
			{
				if (buttons.indexOf(addAfterButtons[i]) > addAfterIndex)
				{
					addAfterIndex = buttons.indexOf(addAfterButtons[i]);
				}
			}

			var addAfterButton = buttons[addAfterIndex];

			// Add the buttons to the toolbar.
			for (var i = 0; i < buttonsInlineStyles.length; i++)
			{
				switch (buttonsInlineStyles[i])
				{

					case 'ins':
					{
						var btnIns = this.button.addAfter(addAfterButton, 'ins', Craft.t('Inserted'));
						this.button.setAwesome('ins', 'fa-underline');
						this.button.addCallback(btnIns, this.inlinestyles.formatIns);
						this.observe.addButton('ins', 'ins');

						break;
					}

					case 'q':
					{
						var btnQ = this.button.addAfter(addAfterButton, 'q', Craft.t('Quote'));
						this.button.setAwesome('q', 'fa-quote-right');
						this.button.addCallback(btnQ, this.inlinestyles.formatQ);
						this.observe.addButton('q', 'q');

						break;
					}

					case 'sup':
					{
						var btnSup = this.button.addAfter(addAfterButton, 'sup', Craft.t('Superscript'));
						this.button.setAwesome('sup', 'fa-superscript');
						this.button.addCallback(btnSup, this.inlinestyles.formatSup);
						this.observe.addButton('sup', 'sup');

						break;
					}

					case 'sub':
					{
						var btnSub = this.button.addAfter(addAfterButton, 'sub', Craft.t('Subscript'));
						this.button.setAwesome('sub', 'fa-subscript');
						this.button.addCallback(btnSub, this.inlinestyles.formatSub);
						this.observe.addButton('sub', 'sub');

						break;
					}

					case 'small':
					{
						var btnSmall = this.button.addAfter(addAfterButton, 'small', Craft.t('Small Print'));
						this.button.setAwesome('small', 'fa-search');
						this.button.addCallback(btnSmall, this.inlinestyles.formatSmall);
						this.observe.addButton('small', 'small');

						break;
					}

					case 'mark':
					{
						var btnMark = this.button.addAfter(addAfterButton, 'mark', Craft.t('Marked'));
						this.button.setAwesome('mark', 'fa-pencil');
						this.button.addCallback(btnMark, this.inlinestyles.formatMark);
						this.observe.addButton('mark', 'mark');

						break;
					}

					case 'code':
					{
						var btnCode = this.button.addAfter(addAfterButton, 'code', Craft.t('Code'));
						this.button.setAwesome('code', 'fa-code');
						this.button.addCallback(btnCode, this.inlinestyles.formatCode);
						this.observe.addButton('code', 'code');

						break;
					}
				}
			}
		},

		formatIns: function()
		{
			this.inline.format('ins');
		},

		formatQ: function()
		{
			this.inline.format('q');
		},

		formatSub: function()
		{
			this.inline.format('sub');
		},

		formatSup: function()
		{
			this.inline.format('sup');
		},

		formatSmall: function()
		{
			this.inline.format('small');
		},

		formatMark: function()
		{
			this.inline.format('mark');
		},

		formatCode: function()
		{
			this.inline.format('code');
		},

	};
};
