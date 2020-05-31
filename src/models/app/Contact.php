<?php

namespace app\models\app;

use Yii;

/**
 * This is the model class for table "app_contact".
 *
 * @property int $id
 * @property string|null $hash
 * @property string $app
 * @property string $email
 * @property string $name
 * @property string $question
 * @property int|null $answered
 * @property string|null $created_at
 */
class Contact extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'app_contact';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['app', 'email', 'name', 'question'], 'required'],
            [['answered'], 'integer'],
            [['created_at'], 'safe'],
            [['hash'], 'string', 'max' => 32],
            [['app'], 'string', 'max' => 25],
            ['email', 'email'],
            [['email', 'name'], 'string', 'max' => 50],
            [['question'], 'string', 'max' => 1000],
            // verifyCode needs to be entered correctly
//            ['verifyCode', 'captcha'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'hash' => 'Hash',
            'app' => 'App',
            'email' => 'Email',
            'name' => 'Name',
            'question' => 'Question',
            'answered' => 'Answered',
            'created_at' => 'Created At',
        ];
    }
}
