<?php

namespace carlcs\redactorcustomstyles\assets\customcp;

use carlcs\redactorcustomstyles\Plugin;
use Craft;
use craft\helpers\FileHelper;
use craft\web\AssetBundle;
use craft\web\assets\cp\CpAsset;

class CustomCpAsset extends AssetBundle
{
    /**
     * @var string|null
     */
    public $iconSprite;

    /**
     * @inheritdoc
     */
    public function init()
    {
        $settings = Plugin::getInstance()->getSettings();

        $sourcePath = $settings->resourcesPath ?? '@config/redactor/resources';
        $sourcePath = Craft::getAlias(trim($sourcePath, '/\\'));

        if (!is_dir($sourcePath)) {
            return;
        }

        $this->sourcePath = $sourcePath;

        $this->depends = [
            CpAsset::class,
        ];

        $options = [
            'only' => ['*.js', '*.css', '*.svg']
        ];

        foreach (FileHelper::findFiles($sourcePath, $options) as $file) {
            $relativePath = substr($file, strlen($sourcePath) + 1);

            switch (pathinfo($file, PATHINFO_EXTENSION)) {
                case 'js':
                    $this->js[] = $relativePath;
                    break;
                case 'css':
                    $this->css[] = $relativePath;
                    break;
                case 'svg':
                    if (pathinfo($file, PATHINFO_FILENAME) === 'icons') {
                        $this->iconSprite = $file;
                    }
                    break;
            }
        }

        parent::init();
    }
}
