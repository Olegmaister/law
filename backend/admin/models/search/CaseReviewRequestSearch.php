<?php

namespace admin\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\CaseReviewRequest;

/**
 * CaseReviewRequestSearch represents the model behind the search form of `common\models\CaseReviewRequest`.
 */
class CaseReviewRequestSearch extends CaseReviewRequest
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'status', 'created_at'], 'integer'],
            [['ip', 'name', 'email', 'phone', 'message'], 'safe'],
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
        $query = CaseReviewRequest::find()
            ->addOrderBy(['status' => SORT_ASC]);

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query, 'sort'=> ['defaultOrder' => $query->defaultOrder]
        ]);

        $this->load($params);

        if (!$this->validate()) {
            $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'status' => $this->status,
            'created_at' => $this->created_at,
        ]);

        if (!$this->status) {
            $query->andWhere(['status' => array_diff(array_keys(self::enum('status')), [self::STATUS_ARCHIVE])]);
        }

        $query->andFilterWhere(['ilike', 'ip', $this->ip])
            ->andFilterWhere(['ilike', 'name', $this->name])
            ->andFilterWhere(['ilike', 'email', $this->email])
            ->andFilterWhere(['ilike', 'phone', $this->phone])
            ->andFilterWhere(['ilike', 'message', $this->message]);

        return $dataProvider;
    }
}
