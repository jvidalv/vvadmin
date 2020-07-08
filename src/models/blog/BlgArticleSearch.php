<?php

namespace app\models\blog;

use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * BlgArticleSearch represents the model behind the search form of `app\models\blog\BlgArticle`.
 */
class BlgArticleSearch extends BlgArticle
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'id_blog', 'id_user', 'id_category', 'words_count', 'claps', 'featured', 'time_to_read'], 'integer'],
            [['date', 'title'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = BlgArticle::find()->alias('a');
        $query->leftJoin('blg_article_has_content c', 'c.id_article = a.id');

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id_blog' => $this->id_blog,
            'id_user' => $this->id_user,
            'id_category' => $this->id_category,
            'date' => $this->date,
            'words_count' => $this->words_count,
            'claps' => $this->claps,
            'featured' => $this->featured,
            'time_to_read' => $this->time_to_read,
            'c.title' => $this->title,
        ]);

        return $dataProvider;
    }
}
