<?php

namespace admin\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Letter;

/**
 * LetterSearch represents the model behind the search form of `common\models\Letter`.
 */
class LetterSearch extends Letter
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'created_at'], 'integer'],
            [['affiliate_name', 'email', 'phone', 'state', 'client_first_name', 'client_last_name', 'debt_collector', 'original_creditor', 'date_of_letter', 'image', 'comment'], 'safe'],
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
        $query = Letter::find();

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
            'created_at' => $this->created_at,
        ]);

        $query->andFilterWhere(['ilike', 'affiliate_name', $this->affiliate_name])
            ->andFilterWhere(['ilike', 'email', $this->email])
            ->andFilterWhere(['ilike', 'phone', $this->phone])
            ->andFilterWhere(['ilike', 'state', $this->state])
            ->andFilterWhere(['ilike', 'client_first_name', $this->client_first_name])
            ->andFilterWhere(['ilike', 'client_last_name', $this->client_last_name])
            ->andFilterWhere(['ilike', 'debt_collector', $this->debt_collector])
            ->andFilterWhere(['ilike', 'original_creditor', $this->original_creditor])
            ->andFilterWhere(['ilike', 'date_of_letter', $this->date_of_letter])
            ->andFilterWhere(['ilike', 'image', $this->image])
            ->andFilterWhere(['ilike', 'comment', $this->comment]);

        return $dataProvider;
    }
}
