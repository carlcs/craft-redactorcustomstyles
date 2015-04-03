<?php
namespace Craft;

class RedactorInlineStylesPlugin extends BasePlugin
{
	function getName()
	{
		return 'Redactor Inline Styles';
	}

	function getVersion()
	{
		return '1.0';
	}

	function getDeveloper()
	{
		return 'carlcs';
	}

	function getDeveloperUrl()
	{
		return 'https://github.com/carlcs/craft-redactorinlinestyles';
	}

	public function init()
	{
		craft()->templates->includeTranslations('Superscript', 'Subscript', 'Marked', 'Code');

		if (!craft()->isConsole())
		{
			if (craft()->request->isCpRequest())
			{
				craft()->templates->includeJsResource('redactorinlinestyles/redactor.js');
				craft()->templates->includeCssResource('redactorinlinestyles/redactor.css');
				craft()->templates->includeCssResource('redactorinlinestyles/font-awesome/css/font-awesome.css');
			}
		}
	}
}
