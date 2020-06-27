<?php

namespace app\models\blog;

use Yii;

/**
 * This is the model class for table "blg_newsletter".
 *
 * @property int $id
 * @property int $id_blog
 * @property string $email
 * @property int|null $active
 * @property int|null $created_at
 *
 * @property BlgBlog $blog
 */
class BlgNewsletter extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'blg_newsletter';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_blog', 'active', 'created_at'], 'integer'],
            [['email'], 'required'],
            [['email'], 'string', 'max' => 50],
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
            'email' => 'Email',
            'active' => 'Active',
            'created_at' => 'Created At',
        ];
    }

    /**
     * Gets query for [[Blog]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBlog()
    {
        return $this->hasOne(BlgBlog::class, ['id' => 'id_blog']);
    }
}
