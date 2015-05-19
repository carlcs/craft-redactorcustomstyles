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
		return '1.1';
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
		craft()->templates->includeTranslations('Inserted', 'Quote', 'Superscript', 'Subscript', 'Code', 'Small Print', 'Marked', 'Prevent Line Breaks');

		if (!craft()->isConsole())
		{
			if (craft()->request->isCpRequest())
			{
				craft()->templates->includeJsResource('redactorinlinestyles/redactor.js');
				craft()->templates->includeCssResource('redactorinlinestyles/redactor.css');
			}
		}
	}
}
