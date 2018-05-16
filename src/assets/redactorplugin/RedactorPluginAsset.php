<?php

namespace carlcs\redactorcustomstyles\assets\redactorplugin;

use carlcs\redactorcustomstyles\Plugin;
use craft\web\AssetBundle;

class RedactorPluginAsset extends AssetBundle
{
    /**
     * @inheritdoc
     */
    public function init()
    {
        $this->sourcePath = __DIR__.'/dist/assetbundle';

        if (Plugin::getInstance()->getSettings()->svgPolyfill) {
            $this->js[] = 'svg-polyfill.js';
        }

        $this->css[] = 'customstyles.css';

        parent::init();
    }
}
