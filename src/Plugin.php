<?php

namespace carlcs\redactorcustomstyles;

use carlcs\redactorcustomstyles\assets\customcp\CustomCpAsset;
use Craft;
use craft\helpers\FileHelper;
use craft\helpers\StringHelper;
use craft\redactor\events\ModifyRedactorConfigEvent;
use craft\redactor\Field as RedactorField;
use craft\redactor\events\RegisterPluginPathsEvent;
use yii\base\Event;

/**
 * @method static Plugin getInstance()
 */
class Plugin extends \craft\base\Plugin
{
    // Properties
    // =========================================================================

    private ?array $_icons = null;
    private array $_translations = [];

    // Public Methods
    // =========================================================================

    public function init()
    {
        parent::init();

        if (Craft::$app->getRequest()->getIsCpRequest()) {
            Event::on(RedactorField::class, RedactorField::EVENT_REGISTER_PLUGIN_PATHS, function(RegisterPluginPathsEvent $event) {
                $event->paths[] = Craft::getAlias('@carlcs/redactorcustomstyles/redactor-plugins');
            });

            $view = Craft::$app->getView();

            /** @var CustomCpAsset $customCpAsset */
            $view->registerAssetBundle(CustomCpAsset::class);
            $view->registerJsWithVars(
                fn($variables) => "Craft.RedactorCustomStyles = $variables",
                [['icons' => $this->_getIcons()]],
            );

            Event::on(RedactorField::class, RedactorField::EVENT_DEFINE_REDACTOR_CONFIG, function(ModifyRedactorConfigEvent $event) use ($view) {
                if (($config = $event->config['customStyles'] ?? $event->config['customstyles'] ?? null) !== null) {
                    $this->_prepareRedactorConfig($config);
                    $event->config['customStyles'] = $config;

                    $view->registerTranslations('redactor-custom-styles', $this->_translations);
                }
            });
        }
    }

    // Private Methods
    // =========================================================================

    private function _getIcons(): array
    {
        if ($this->_icons !== null) {
            return $this->_icons;
        }

        $dirs = [
            Craft::getAlias('@carlcs/redactorcustomstyles/assets/icons'),
            Craft::getAlias('@config/redactor/resources'),
        ];

        $this->_icons = [];
        foreach ($dirs as $dir) {
            if (is_dir($dir)) {
                foreach (FileHelper::findFiles($dir, ['only' => ['*.svg']]) as $icon) {
                    $this->_icons[pathinfo($icon, PATHINFO_FILENAME)] = file_get_contents($icon);
                }
            }
        }

        return $this->_icons;
    }

    private function _prepareRedactorConfig(array &$config)
    {
        foreach($config as $key => &$val) {
            $this->_translations[] = $val['title'] = $val['title']
                ?? StringHelper::toTitleCase(implode(' ', StringHelper::toWords($key, false, true)));

            if (isset($val['dropdown'])) {
                $this->_prepareRedactorConfig($val['dropdown']);
            }
        }
    }
}
