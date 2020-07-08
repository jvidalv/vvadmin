<?php

namespace app\models\blog;

use yii\db\ActiveQuery;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "blg_article_has_tag".
 *
 * @property int $id
 * @property int $id_article
 * @property string $name
 *
 * @property BlgArticle $article
 */
class BlgArticleHasTag extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'blg_article_has_tag';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_article', 'name'], 'required'],
            [['id_article'], 'integer'],
            [['name'], 'string', 'max' => 25],
            [['id_article', 'name'], 'unique', 'targetAttribute' => ['id_article', 'name']],
            [['id_article'], 'exist', 'skipOnError' => true, 'targetClass' => BlgArticle::class, 'targetAttribute' => ['id_article' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_article' => 'Id Article',
            'name' => 'Name',
        ];
    }

    /**
     * Gets query for [[Article]].
     *
     * @return ActiveQuery
     */
    public function getArticle()
    {
        return $this->hasOne(BlgArticle::class, ['id' => 'id_article']);
    }
}
