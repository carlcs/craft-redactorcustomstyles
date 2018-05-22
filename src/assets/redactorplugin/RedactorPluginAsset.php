<?php

namespace carlcs\redactorcustomstyles\assets\redactorplugin;

use carlcs\redactorcustomstyles\Plugin;
use craft\web\AssetBundle;
use craft\web\assets\cp\CpAsset;

class RedactorPluginAsset extends AssetBundle
{
    /**
     * @inheritdoc
     */
    public function init()
    {
        $this->sourcePath = __DIR__.'/dist';

        $this->depends = [
            CpAsset::class,
        ];

        if (Plugin::getInstance()->getSettings()->svgPolyfill) {
            $this->js[] = 'svg-polyfill.js';
        }

        $this->js[] = 'customstyles.js';
        $this->css[] = 'customstyles.css';

        parent::init();
    }
}
