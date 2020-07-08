<?php

namespace app\models\blog;

use yii\db\ActiveQuery;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "blg_article_has_anchor".
 *
 * @property int $id
 * @property int $id_content
 * @property string|null $anchor
 * @property string|null $text
 *
 * @property BlgArticleHasContent $content
 */
class BlgArticleHasAnchor extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'blg_article_has_anchor';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_content'], 'required'],
            [['id_content'], 'integer'],
            [['anchor'], 'string', 'max' => 10],
            [['text'], 'string', 'max' => 150],
            [['id_content'], 'exist', 'skipOnError' => true, 'targetClass' => BlgArticleHasContent::class, 'targetAttribute' => ['id_content' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_content' => 'Id Content',
            'anchor' => 'Anchor',
            'text' => 'Text',
        ];
    }

    /**
     * Gets query for [[Content]].
     *
     * @return ActiveQuery
     */
    public function getContent()
    {
        return $this->hasOne(BlgArticleHasContent::class, ['id' => 'id_content']);
    }
}
