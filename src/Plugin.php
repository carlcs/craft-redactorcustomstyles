<?php

namespace carlcs\redactorcustomstyles;

use carlcs\redactorcustomstyles\assets\customcp\CustomCpAsset;
use Craft;
use craft\helpers\FileHelper;
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
}
