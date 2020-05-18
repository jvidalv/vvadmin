<?php

namespace app\utils;

use Yii;

/**
 * Class Git
 * @package app\utils
 */
class Git
{
    /**
     * Returns current git version
     * @return string
     */
    public static function getCurrentVersion()
    {
        $path = Yii::getAlias('@app');
        `git rev-parse --abbrev-ref HEAD > $path/version`;
        return 'V.' . file_get_contents(Yii::getAlias('@app/version'));
    }
}