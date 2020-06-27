<?php

namespace app\models\blog;

use Yii;
use yii\behaviors\SluggableBehavior;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "blg_article_has_content".
 *
 * @property int $id
 * @property int $id_article
 * @property int $id_language
 * @property int $id_state
 * @property string|null $title
 * @property string|null $resume
 * @property resource|null $content
 * @property int|null $updated_at
 * @property int|null $created_at
 *
 * @property BlgArticleHasAnchor[] $blgArticleHasAnchors
 * @property BlgArticle $article
 * @property BlgLanguage $language
 * @property BlgState $state
 */
class BlgArticleHasContent extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            TimestampBehavior::class,
            [
                'class' => SluggableBehavior::class,
                'attribute' => 'title',
                'ensureUnique' => true,
                'immutable' => false
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'blg_article_has_content';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_article', 'id_language', 'id_state', 'title'], 'required'],
            [['id_article', 'id_language', 'id_state', 'updated_at', 'created_at'], 'integer'],
            [['content'], 'string'],
            [['slug'], 'string', 'max' => 200],
            [['slug'], 'unique'],
            [['title'], 'string', 'max' => 120],
            [['resume'], 'string', 'max' => 200],
            [['id_article'], 'exist', 'skipOnError' => true, 'targetClass' => BlgArticle::class, 'targetAttribute' => ['id_article' => 'id']],
            [['id_language'], 'exist', 'skipOnError' => true, 'targetClass' => BlgLanguage::class, 'targetAttribute' => ['id_language' => 'id']],
            [['id_state'], 'exist', 'skipOnError' => true, 'targetClass' => BlgState::class, 'targetAttribute' => ['id_state' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_article' => 'Article',
            'id_language' => 'Language',
            'id_state' => 'State',
            'title' => 'Title',
            'resume' => 'Resume',
            'content' => 'Content',
            'updated_at' => 'Updated At',
            'created_at' => 'Created At',
            'slug' => 'Slug',
        ];
    }

    /**
     * Gets query for [[BlgArticleHasAnchors]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBlgArticleHasAnchors()
    {
        return $this->hasMany(BlgArticleHasAnchor::class, ['id_content' => 'id']);
    }

    /**
     * Gets query for [[Article]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getArticle()
    {
        return $this->hasOne(BlgArticle::class, ['id' => 'id_article']);
    }

    /**
     * Gets query for [[Language]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLanguage()
    {
        return $this->hasOne(BlgLanguage::class, ['id' => 'id_language']);
    }

    /**
     * Gets query for [[State]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getState()
    {
        return $this->hasOne(BlgState::class, ['id' => 'id_state']);
    }

    /**
     * Gets query for [[BlgArticleHasContent]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOtherTranslations()
    {
        return $this->hasMany(BlgArticleHasContent::class, ['id_article' => 'id_article']);
    }
}
