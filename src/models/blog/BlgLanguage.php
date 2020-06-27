<?php

namespace app\models\blog;

use Yii;

/**
 * This is the model class for table "blg_language".
 *
 * @property int $id
 * @property string $code
 * @property string $name
 *
 * @property BlgArticleHasContent[] $blgArticleHasContents
 */
class BlgLanguage extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'blg_language';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['code', 'name'], 'required'],
            [['code'], 'string', 'max' => 2],
            [['name'], 'string', 'max' => 15],
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
        ];
    }

    /**
     * Gets query for [[BlgArticleHasContents]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBlgArticleHasContents()
    {
        return $this->hasMany(BlgArticleHasContent::class, ['id_language' => 'id']);
    }
}
