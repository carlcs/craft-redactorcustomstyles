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
        return '2.1.0';
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
        return 'https://github.com/carlcs';
    }

    public function getDocumentationUrl()
    {
        return 'https://github.com/carlcs/craft-redactorinlinestyles';
    }

    public function getReleaseFeedUrl()
    {
        return 'https://github.com/carlcs/craft-redactorinlinestyles/raw/master/releases.json';
    }

    // Public Methods
    // =========================================================================

    /**
     * Initializes the plugin.
     */
    public function init()
    {
        if (craft()->request->isCpRequest()) {
            $this->includeCpResources();
        }
    }

    /**
     * Make sure requirements are met before installation.
     *
     * @throws Exception
     */
    public function onBeforeInstall()
    {
        if (!defined('PHP_VERSION') || version_compare(PHP_VERSION, '5.4', '<')) {
            throw new Exception($this->getName().' plugin requires PHP 5.4 or later.');
        }
    }

    // Protected Methods
    // =========================================================================

    /**
     * Includes the plugin's resources for the Control Panel.
     */
    protected function includeCpResources()
    {
        // Include JS
        craft()->templates->includeJsResource('redactorinlinestyles/redactorinlinestyles.js');

        // Include CSS
        $includeCustomCpResources = craft()->config->get('includeCustomCpResources', 'redactorinlinestyles');
        if (filter_var($includeCustomCpResources, FILTER_VALIDATE_BOOLEAN)) {
            $this->includeCustomCpResources();
        }

        // Include translations
        $translatable = craft()->config->get('translatable', 'redactorinlinestyles');
        call_user_func_array([craft()->templates, 'includeTranslations'], $translatable);
    }

    /**
     * Includes resources for the Control Panel from the craft/config/cp/ folder.
     */
    protected function includeCustomCpResources()
    {
        $resourcesFolderPath = craft()->path->getConfigPath().'cp/';

        if (IOHelper::folderExists($resourcesFolderPath)) {
            $resourcesPaths = glob($resourcesFolderPath.'*.{css,js}', GLOB_BRACE);

            foreach ($resourcesPaths as $resourcePath) {
                switch (IOHelper::getExtension($resourcePath)) {
                    case 'css':
                        craft()->templates->includeCss(IOHelper::getFileContents($resourcePath));
                        break;
                    case 'js':
                        craft()->templates->includeJs(IOHelper::getFileContents($resourcePath));
                        break;
                }
            }
        }
    }
}
