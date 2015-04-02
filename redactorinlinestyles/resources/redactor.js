if (!RedactorPlugins) var RedactorPlugins = {};

RedactorPlugins.inlinestyles = function()
{
	return {
		init: function ()
		{
			var btnSup = this.button.addBefore('unorderedlist', 'sup', 'Superscript');
			var btnSub = this.button.addBefore('unorderedlist', 'sub', 'Subscript');
			var btnMark = this.button.addBefore('unorderedlist', 'mark', 'Highlight');
			var btnCode = this.button.addBefore('unorderedlist', 'code', 'Code');

			this.button.setAwesome('sup', 'fa-superscript');
			this.button.setAwesome('sub', 'fa-subscript');
			this.button.setAwesome('mark', 'fa-pencil');
			this.button.setAwesome('code', 'fa-code');

			this.button.addCallback(btnSup, this.inlinestyles.formatSup);
			this.button.addCallback(btnSub, this.inlinestyles.formatSub);
			this.button.addCallback(btnMark, this.inlinestyles.formatMark);
			this.button.addCallback(btnCode, this.inlinestyles.formatCode);

			this.observe.addButton('sup', 'sup');
			this.observe.addButton('sub', 'sub');
			this.observe.addButton('mark', 'mark');
			this.observe.addButton('code', 'code');
		},
		formatSub: function()
		{
			this.inline.format('sub');
		},
		formatSup: function()
		{
			this.inline.format('sup');
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
