<?php

namespace app\models\astrale;

use Yii;

/**
 * Class User
 * @package app\models\astrale
 * @property string $sign
 * @property string $birth_date
 * @property string $name
 * @property string $relationship_status
 * @property string $sex
 * @property int $number
 * @property string $expo_token
 * @property string $created_at
 */
class User extends \yii\mongodb\ActiveRecord
{
    /**
     * @return object|\yii\mongodb\Connection|null
     * @throws \yii\base\InvalidConfigException
     */
    public static function getDb()
    {
        return Yii::$app->get('db_astrale');
    }

    /**
     * @return array|string
     */
    public static function collectionName()
    {
        return 'user';
    }

    /**
     * @return array|string[]
     */
    public function attributes()
    {
        return ['_id', 'name', 'birth_date', 'sign', 'relationship_status', 'sex', 'number', 'expo_token', 'created_at'];
    }
}