if (!RedactorPlugins) var RedactorPlugins = {};

RedactorPlugins.inlinestyles = function()
{
	return {

		init: function ()
		{
			// Position the buttons right after the last default inline style button.
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

			// Get the list of buttons from the config file.
			var buttonsInlineStyles = this.opts.buttonsInlineStyles;

			if (typeof buttonsInlineStyles == 'undefined')
			{
				buttonsInlineStyles = ['ins', 'q', 'sup', 'sub', 'code', 'small', 'mark', 'nobr'];
			}

			buttonsInlineStyles.reverse();

			// Add the buttons to the toolbar.
			for (var i = 0; i < buttonsInlineStyles.length; i++)
			{
				switch (buttonsInlineStyles[i])
				{

					case 'ins':
					{
						var btnIns = this.button.addAfter(addAfterButton, 'ins', Craft.t('Inserted'));
						this.button.addCallback(btnIns, this.inlinestyles.formatIns);
						this.observe.addButton('ins', 'ins');

						break;
					}

					case 'q':
					{
						var btnQ = this.button.addAfter(addAfterButton, 'q', Craft.t('Quote'));
						this.button.addCallback(btnQ, this.inlinestyles.formatQ);
						this.observe.addButton('q', 'q');

						break;
					}

					case 'sup':
					{
						var btnSup = this.button.addAfter(addAfterButton, 'sup', Craft.t('Superscript'));
						this.button.addCallback(btnSup, this.inlinestyles.formatSup);
						this.observe.addButton('sup', 'sup');

						break;
					}

					case 'sub':
					{
						var btnSub = this.button.addAfter(addAfterButton, 'sub', Craft.t('Subscript'));
						this.button.addCallback(btnSub, this.inlinestyles.formatSub);
						this.observe.addButton('sub', 'sub');

						break;
					}

					case 'code':
					{
						var btnCode = this.button.addAfter(addAfterButton, 'code', Craft.t('Code'));
						this.button.addCallback(btnCode, this.inlinestyles.formatCode);
						this.observe.addButton('code', 'code');

						break;
					}

					case 'small':
					{
						var btnSmall = this.button.addAfter(addAfterButton, 'small', Craft.t('Small Print'));
						this.button.addCallback(btnSmall, this.inlinestyles.formatSmall);
						this.observe.addButton('small', 'small');

						break;
					}

					case 'mark':
					{
						var btnMark = this.button.addAfter(addAfterButton, 'mark', Craft.t('Marked'));
						this.button.addCallback(btnMark, this.inlinestyles.formatMark);
						this.observe.addButton('mark', 'mark');

						break;
					}

					case 'nobr':
					{
						var btnNobr = this.button.addAfter(addAfterButton, 'nobr', Craft.t('Prevent Line Breaks'));
						this.button.addCallback(btnNobr, this.inlinestyles.formatNobr);
						this.observe.addButton('nobr', 'nobr');

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

		formatCode: function()
		{
			this.inline.format('code');
		},

		formatSmall: function()
		{
			this.inline.format('small');
		},

		formatMark: function()
		{
			this.inline.format('mark');
		},

		formatNobr: function()
		{
			this.inline.format('span', 'class', 'nobr');
		},

	};
};
