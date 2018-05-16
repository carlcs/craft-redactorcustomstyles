<?php

namespace carlcs\redactorcustomstyles;

use craft\base\Model;

class Settings extends Model
{
    /**
     * @var string|null
     */
    public $resourcesPath;

    /**
     * @var bool
     */
    public $svgPolyfill = false;
}

