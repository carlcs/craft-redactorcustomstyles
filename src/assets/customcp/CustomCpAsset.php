<?php

namespace carlcs\redactorcustomstyles\assets\customcp;

use Craft;
use craft\helpers\FileHelper;
use craft\web\AssetBundle;
use craft\web\assets\cp\CpAsset;

class CustomCpAsset extends AssetBundle
{
    public function init()
    {
        $sourcePath = Craft::getAlias('@config/redactor/resources');
        if (!is_dir($sourcePath)) {
            return;
        }

        $this->sourcePath = $sourcePath;
        $this->depends = [
            CpAsset::class,
        ];

        foreach (FileHelper::findFiles($this->sourcePath, ['only' => ['*.js', '*.css']]) as $file) {
            $relativePath = substr($file, strlen($this->sourcePath) + 1);
            switch (pathinfo($file, PATHINFO_EXTENSION)) {
                case 'js':
                    $this->js[] = $relativePath;
                    break;
                case 'css':
                    $this->css[] = $relativePath;
                    break;
            }
        }

        parent::init();
    }
}
