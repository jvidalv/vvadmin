<?php

namespace app\models\blog;

use app\models\app\User;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "blg_article".
 *
 * @property int $id
 * @property int $id_blog
 * @property int $id_user
 * @property int $id_category
 * @property string|null $date
 * @property int|null $words_count
 * @property int|null $claps
 * @property int|null $featured
 * @property int|null $time_to_read
 * @property string|null $slug
 * @property int|null $updated_at
 * @property int|null $created_at
 *
 * @property BlgBlog $blog
 * @property BlgCategory $category
 * @property User $user
 * @property BlgArticleHasContent[] $blgArticleHasContents
 * @property BlgArticleHasTag[] $blgArticleHasTags
 */
class BlgArticle extends ActiveRecord
{

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'blg_article';
    }

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            TimestampBehavior::class,
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_blog', 'id_user', 'id_category', 'words_count', 'claps', 'featured', 'time_to_read'], 'integer'],
            [['id_user', 'id_category'], 'required'],
            [['date'], 'safe'],
            [['id_blog'], 'exist', 'skipOnError' => true, 'targetClass' => BlgBlog::class, 'targetAttribute' => ['id_blog' => 'id']],
            [['id_category'], 'exist', 'skipOnError' => true, 'targetClass' => BlgCategory::class, 'targetAttribute' => ['id_category' => 'id']],
            [['id_user'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['id_user' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_blog' => 'Blog',
            'id_user' => 'User',
            'id_category' => 'Category',
            'date' => 'Date',
            'words_count' => 'Nº Words',
            'claps' => 'Claps',
            'featured' => 'Featured',
            'time_to_read' => 'Time to read',
            'slug' => 'Slug',
            'updated_at' => 'Updated At',
            'created_at' => 'Created At',
            'title' => 'Title',
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

    /**
     * Gets query for [[Category]].
     *
     * @return ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(BlgCategory::class, ['id' => 'id_category']);
    }

    /**
     * Gets query for [[User]].
     *
     * @return ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::class, ['id' => 'id_user']);
    }

    /**
     * Gets query for [[BlgArticleHasContents]].
     *
     * @return ActiveQuery
     */
    public function getBlgArticleHasContents()
    {
        return $this->hasMany(BlgArticleHasContent::class, ['id_article' => 'id']);
    }

    /**
     * Gets query for [[BlgArticleHasTags]].
     *
     * @return ActiveQuery
     */
    public function getBlgArticleHasTags()
    {
        return $this->hasMany(BlgArticleHasTag::class, ['id_article' => 'id']);
    }

    /**
     * Blog title by language
     * @param int|null $idLanguage
     * @return string|null
     */
    public function getTitle(?int $idLanguage = 1): ?string
    {
        $content = BlgArticleHasContent::findOne(['id_article' => $this->id, 'id_language' => $idLanguage]);
        return $content->title ?? null;
    }

}
