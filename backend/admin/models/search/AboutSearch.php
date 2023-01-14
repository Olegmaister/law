<?php

namespace admin\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\About;

/**
 * AboutSearch represents the model behind the search form of `common\models\About`.
 */
class AboutSearch extends About
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'boolean'],
            [['top_text', 'left_title', 'left_text', 'right_title', 'right_text'], 'safe'],
            [['left_photo_id', 'right_photo_id', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
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
        $query = About::find();

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
            'left_photo_id' => $this->left_photo_id,
            'right_photo_id' => $this->right_photo_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'created_by' => $this->created_by,
            'updated_by' => $this->updated_by,
        ]);

        $query->andFilterWhere(['ilike', 'top_text', $this->top_text])
            ->andFilterWhere(['ilike', 'left_title', $this->left_title])
            ->andFilterWhere(['ilike', 'left_text', $this->left_text])
            ->andFilterWhere(['ilike', 'right_title', $this->right_title])
            ->andFilterWhere(['ilike', 'right_text', $this->right_text]);

        return $dataProvider;
    }
}
