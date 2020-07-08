<?php

namespace app\models\blog;

use yii\db\ActiveQuery;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "blg_contact".
 *
 * @property int $id
 * @property int $id_blog
 * @property int $answered
 * @property string|null $name
 * @property string $email
 * @property string $message
 * @property int|null $created_at
 *
 * @property BlgBlog $blog
 */
class BlgContact extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'blg_contact';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_blog', 'email', 'message'], 'required'],
            [['id_blog', 'answered', 'created_at'], 'integer'],
            [['name', 'email'], 'string', 'max' => 50],
            [['message'], 'string', 'max' => 500],
            [['id_blog'], 'exist', 'skipOnError' => true, 'targetClass' => BlgBlog::class, 'targetAttribute' => ['id_blog' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_blog' => 'Id Blog',
            'answered' => 'Answered',
            'name' => 'Name',
            'email' => 'Email',
            'message' => 'Message',
            'created_at' => 'Created At',
        ];
    }

    /**
     * Gets query for [[Blog]].
     *
     * @return ActiveQuery
     */
    public function getBlog()
    {
        return $this->hasOne(BlgBlog::class, ['id' => 'id_blog']);
    }
}
