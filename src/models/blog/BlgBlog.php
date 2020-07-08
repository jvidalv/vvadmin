<?php

namespace app\models\blog;

use yii\db\ActiveQuery;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "blg_blog".
 *
 * @property int $id
 * @property string $code
 * @property string $name
 * @property string|null $information
 * @property int|null $created_at
 * @property int|null $updated_at
 *
 * @property BlgArticle[] $blgArticles
 * @property BlgCategory[] $blgCategories
 * @property BlgContact[] $blgContacts
 * @property BlgNewsletter[] $blgNewsletters
 */
class BlgBlog extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'blg_blog';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['code', 'name'], 'required'],
            [['created_at', 'updated_at'], 'integer'],
            [['code'], 'string', 'max' => 20],
            [['name'], 'string', 'max' => 50],
            [['information'], 'string', 'max' => 250],
            [['code'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'code' => 'Code',
            'name' => 'Name',
            'information' => 'Information',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * Gets query for [[BlgArticles]].
     *
     * @return ActiveQuery
     */
    public function getBlgArticles()
    {
        return $this->hasMany(BlgArticle::class, ['id_blog' => 'id']);
    }

    /**
     * Gets query for [[BlgCategories]].
     *
     * @return ActiveQuery
     */
    public function getBlgCategories()
    {
        return $this->hasMany(BlgCategory::class, ['id_blog' => 'id']);
    }

    /**
     * Gets query for [[BlgContacts]].
     *
     * @return ActiveQuery
     */
    public function getBlgContacts()
    {
        return $this->hasMany(BlgContact::class, ['id_blog' => 'id']);
    }

    /**
     * Gets query for [[BlgNewsletters]].
     *
     * @return ActiveQuery
     */
    public function getBlgNewsletters()
    {
        return $this->hasMany(BlgNewsletter::class, ['id_blog' => 'id']);
    }
}
