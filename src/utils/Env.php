<?php


namespace app\utils;


use Yii;

/**
 * Class Env
 * @package app\utils
 */
class Env
{
    /**
     * @return bool
     */
    public static function isPro(): bool
    {
        return Yii::$app->params['env'] === 'pro';
    }

    /**
     * @return bool
     */
    public static function isTest(): bool
    {
        return Yii::$app->params['env'] === 'test';
    }

    /**
     * @return bool
     */
    public static function isDev(): bool
    {
        return Yii::$app->params['env'] === 'dev';
    }

    /**
     * @return string
     */
    public static function getEnv(): string
    {
        return Yii::$app->params['env'];
    }
}