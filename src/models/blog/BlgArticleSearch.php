<?php

namespace app\models\blog;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\blog\BlgArticle;

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
            [['id', 'id_blog', 'id_user', 'id_category', 'words_count', 'claps', 'featured', 'time_to_read', 'updated_at', 'created_at'], 'integer'],
            [['date'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
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
        $query = BlgArticle::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'id_blog' => $this->id_blog,
            'id_user' => $this->id_user,
            'id_category' => $this->id_category,
            'date' => $this->date,
            'words_count' => $this->words_count,
            'claps' => $this->claps,
            'featured' => $this->featured,
            'time_to_read' => $this->time_to_read,
            'updated_at' => $this->updated_at,
            'created_at' => $this->created_at,
        ]);

        return $dataProvider;
    }
}
