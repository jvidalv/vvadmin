<?php

namespace app\models\astrale;

use Yii;

/**
 * This is the model class for table "horoscope_daily".
 */
class Daily extends \yii\mongodb\ActiveRecord
{
    /**
     * @return object|\yii\mongodb\Connection|null
     * @throws \yii\base\InvalidConfigException
     */
    public static function getDb()
    {
        return Yii::$app->get('db_horoscope');
    }

    /**
     * @return array|string
     */
    public static function collectionName()
    {
        return 'horoscope_daily';
    }

    /**
     * @return array|string[]
     */
    public function attributes()
    {
        return ['_id', 'contents', 'day', 'sign'];
    }
}