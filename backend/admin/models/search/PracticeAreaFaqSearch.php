<?php

namespace admin\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\PracticeAreaFaq;

/**
 * PracticeAreaFaqSearch represents the model behind the search form of `common\models\PracticeAreaFaq`.
 */
class PracticeAreaFaqSearch extends PracticeAreaFaq
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'priority', 'created_by', 'updated_by', 'created_at', 'updated_at', 'practice_area_id'], 'integer'],
            [['title', 'text', 'type'], 'safe'],
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
        $query = PracticeAreaFaq::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query, 'sort' => ['defaultOrder' => $query->defaultOrder]
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
            'priority' => $this->priority,
            'created_by' => $this->created_by,
            'updated_by' => $this->updated_by,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'practice_area_id' => $this->practice_area_id,
        ]);

        $query->andFilterWhere(['ilike', 'title', $this->title])
            ->andFilterWhere(['ilike', 'text', $this->text])
            ->andFilterWhere(['ilike', 'type', $this->type]);

        return $dataProvider;
    }
}
