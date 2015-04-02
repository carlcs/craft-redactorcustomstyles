if (!RedactorPlugins) var RedactorPlugins = {};

RedactorPlugins.inlinestyles = function()
{
	return {
		init: function ()
		{
			var btnCode = this.button.addBefore('unorderedlist', 'code', 'Code');
			var btnSub = this.button.addBefore('unorderedlist', 'sub', 'Subscript');
			var btnSup = this.button.addBefore('unorderedlist', 'sup', 'Superscript');

			this.button.setAwesome('code', 'fa-code');
			this.button.setAwesome('sub', 'fa-subscript');
			this.button.setAwesome('sup', 'fa-superscript');

			this.button.addCallback(btnCode, this.inlinestyles.formatCode);
			this.button.addCallback(btnSub, this.inlinestyles.formatSub);
			this.button.addCallback(btnSup, this.inlinestyles.formatSup);
		},
		formatCode: function()
		{
			this.inline.format('code');
		},
		formatSub: function()
		{
			this.inline.format('sub');
		},
		formatSup: function()
		{
			this.inline.format('sup');
		}
	};
};
