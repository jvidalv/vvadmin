<?php

namespace app\models\blog;

use app\models\app\User;
use Yii;
use yii\behaviors\SluggableBehavior;
use yii\behaviors\TimestampBehavior;

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
class BlgArticle extends \yii\db\ActiveRecord
{

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
    public static function tableName()
    {
        return 'blg_article';
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
            'id_blog' => 'Id Blog',
            'id_user' => 'Id User',
            'id_category' => 'Id Category',
            'date' => 'Date',
            'words_count' => 'Words Count',
            'claps' => 'Claps',
            'featured' => 'Featured',
            'time_to_read' => 'Time To Read',
            'slug' => 'Slug',
            'updated_at' => 'Updated At',
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

    /**
     * Gets query for [[Category]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(BlgCategory::class, ['id' => 'id_category']);
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::class, ['id' => 'id_user']);
    }

    /**
     * Gets query for [[BlgArticleHasContents]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBlgArticleHasContents()
    {
        return $this->hasMany(BlgArticleHasContent::class, ['id_article' => 'id']);
    }

    /**
     * Gets query for [[BlgArticleHasTags]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBlgArticleHasTags()
    {
        return $this->hasMany(BlgArticleHasTag::class, ['id_article' => 'id']);
    }

}
