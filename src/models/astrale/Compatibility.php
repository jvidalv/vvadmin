<?php

namespace app\models\astrale;

use Yii;

/**
 * This is the model class for table "horoscope_daily".
 */
class Compatibility extends \yii\mongodb\ActiveRecord
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
        return 'horoscope_stale';
    }

    /**
     * @return array|string[]
     */
    public function attributes()
    {
        return ['_id', 'percents', 'relationship', 'resume', 'sign1', 'sign2', 'type'];
    }
}