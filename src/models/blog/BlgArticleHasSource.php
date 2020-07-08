<?php

namespace app\models\blog;

use yii\db\ActiveRecord;

/**
 * This is the model class for table "blg_article_has_source".
 *
 * @property int $id
 * @property int $id_article
 * @property string $type
 * @property string $name
 * @property string|null $version
 * @property string|null $url
 * @property int $visible
 */
class BlgArticleHasSource extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'blg_article_has_source';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_article', 'type', 'name'], 'required'],
            [['id_article', 'visible'], 'integer'],
            [['type'], 'string', 'max' => 15],
            [['name'], 'string', 'max' => 25],
            [['version'], 'string', 'max' => 10],
            [['url'], 'string', 'max' => 120],
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
            'type' => 'Type',
            'name' => 'Name',
            'version' => 'Version',
            'url' => 'Url',
            'visible' => 'Visible',
        ];
    }
}
