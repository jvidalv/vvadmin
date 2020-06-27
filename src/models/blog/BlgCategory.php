<?php

namespace app\models\blog;

use Yii;

/**
 * This is the model class for table "blg_category".
 *
 * @property int $id
 * @property int $id_blog
 * @property string $code
 * @property string $name
 * @property string|null $description
 * @property string|null $color
 * @property int|null $priority
 *
 * @property BlgArticle[] $blgArticles
 * @property BlgBlog $blog
 */
class BlgCategory extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'blg_category';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_blog', 'priority'], 'integer'],
            [['code', 'name'], 'required'],
            [['code', 'name'], 'string', 'max' => 30],
            [['description'], 'string', 'max' => 200],
            [['color'], 'string', 'max' => 10],
            [['code'], 'unique'],
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
            'code' => 'Code',
            'name' => 'Name',
            'description' => 'Description',
            'color' => 'Color',
            'priority' => 'Priority',
        ];
    }

    /**
     * Gets query for [[BlgArticles]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBlgArticles()
    {
        return $this->hasMany(BlgArticle::class, ['id_category' => 'id']);
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
