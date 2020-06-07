<?php

namespace app\models\blog;

use Yii;

/**
 * This is the model class for table "blg_state".
 *
 * @property int $id
 * @property string|null $code
 * @property string|null $information
 *
 * @property BlgArticleHasContent[] $blgArticleHasContents
 */
class BlgState extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'blg_state';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['code'], 'string', 'max' => 10],
            [['information'], 'string', 'max' => 50],
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
            'information' => 'Information',
        ];
    }

    /**
     * Gets query for [[BlgArticleHasContents]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBlgArticleHasContents()
    {
        return $this->hasMany(BlgArticleHasContent::class, ['id_state' => 'id']);
    }
}
