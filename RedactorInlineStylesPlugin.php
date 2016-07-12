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
        return '2.1.1';
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

    /**
     * Registers resource paths for requests starting with config/redactorinlinestyles/.
     */
    public function getResourcePath($path)
    {
        if (strncmp($path, 'config/redactorinlinestyles/', 28) == 0) {
            return craft()->path->getConfigPath().'redactorinlinestyles/'.substr($path, 28);
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
     * Includes resources for the Control Panel from the craft/config/redactorinlinestyles/ folder.
     */
    protected function includeCustomCpResources()
    {
        $folderPath = craft()->path->getConfigPath().'redactorinlinestyles/';

        if (IOHelper::folderExists($folderPath)) {
            $filePaths = glob($folderPath.'*.{css,js}', GLOB_BRACE);

            foreach ($filePaths as $filePath) {
                $resourcePath = 'config/redactorinlinestyles/'.str_replace($folderPath, '', $filePath);

                switch (IOHelper::getExtension($filePath)) {
                    case 'css':
                        craft()->templates->includeCssResource($resourcePath);
                        break;
                    case 'js':
                        craft()->templates->includeJsResource($resourcePath);
                        break;
                }
            }
        }
    }
}
