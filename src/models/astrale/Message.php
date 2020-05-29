<?php

namespace app\models\astrale;

use Yii;
use yii\helpers\Html;

/**
 * Class Message
 * @package app\models\astrale
 * @property string $_id
 * @property string $message
 * @property string $email
 * @property string $astrologer
 * @property bool $answered
 */
class Message extends \yii\mongodb\ActiveRecord
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
        return 'message';
    }

    /**
     * @return array|string[]
     */
    public function attributes()
    {
        return ['_id', 'email', 'astrologer', 'message', 'answered'];
    }

    public function getAnsweredHtml()
    {
        $ans = $this->answered;
        return Html::a($ans ? 'Yes' : 'No', ['answered?id=' . $this->_id], ['class' => "badge badge-" . ($ans ? 'success' : 'warning'), 'data-confirm' => 'Are you sure?']);
    }
}