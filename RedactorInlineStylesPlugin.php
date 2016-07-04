<?php
namespace Craft;

class RedactorInlineStylesPlugin extends BasePlugin
{
    public function getName()
    {
        return 'Redactor Inline Styles';
    }

    public function getVersion()
    {
        return '2.0.5';
    }

    public function getSchemaVersion()
    {
        return '2.0.2';
    }

    public function getDeveloper()
    {
        return 'carlcs';
    }

    public function getDeveloperUrl()
    {
        return 'https://github.com/carlcs/craft-redactorinlinestyles';
    }

    public function getDocumentationUrl()
    {
        return 'https://github.com/carlcs/craft-redactorinlinestyles';
    }

    public function getReleaseFeedUrl()
    {
        return 'https://github.com/carlcs/craft-redactorinlinestyles/raw/master/releases.json';
    }

    public function init()
    {
        if (!craft()->isConsole()) {
            if (craft()->request->isCpRequest()) {
                // Prepare config
                $config = array();

                $config['buttonsAdd'] = craft()->config->get('buttonsAdd', 'redactorinlinestyles');
                $config['buttonsAddAfter'] = craft()->config->get('buttonsAddAfter', 'redactorinlinestyles');
                $config['setIcons'] = craft()->config->get('setIcons', 'redactorinlinestyles');

                if (craft()->config->get('iconsFile', 'redactorinlinestyles')) {
                    $url = craft()->config->get('iconsFile', 'redactorinlinestyles');
                    $config['iconsFile'] = craft()->config->parseEnvironmentString($url);
                } else {
                    $config['iconsFile'] = UrlHelper::getResourceUrl('redactorinlinestyles/icons/redactor-i.svg');
                }

                // Include JS
                $config = JsonHelper::encode($config);

                $js = "var RedactorInlineStyles = {}; RedactorInlineStyles.config = {$config};";

                craft()->templates->includeJs($js);
                craft()->templates->includeJsResource('redactorinlinestyles/redactorinlinestyles.js');

                // Include CSS
                if (craft()->config->get('cssFile', 'redactorinlinestyles')) {
                    $url = craft()->config->get('cssFile', 'redactorinlinestyles');
                    $url = craft()->config->parseEnvironmentString($url);
                    craft()->templates->includeCssFile($url);
                } else {
                    craft()->templates->includeCssResource('redactorinlinestyles/redactorinlinestyles.css');
                }

                // Include Translations
                $translatable = craft()->config->get('translatable', 'redactorinlinestyles');
                call_user_func_array(array(craft()->templates, 'includeTranslations'), $translatable);

                // Add external spritemaps support for IE9+ and Edge 12
                if (craft()->config->get('ieShim', 'redactorinlinestyles') !== false) {
                    craft()->templates->includeJsResource('redactorinlinestyles/lib/svg4everybody.min.js');
                    craft()->templates->includeJs('svg4everybody();');
                }
            }
        }
    }
}
