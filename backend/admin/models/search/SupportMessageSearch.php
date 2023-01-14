<?php

namespace admin\models\search;

use admin\models\SupportMessage;
use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * SupportMessageSearch represents the model behind the search form of `admin\models\SupportMessage`.
 */
class SupportMessageSearch extends SupportMessage
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'status', 'created_by', 'created_at'], 'integer'],
            [['ip', 'email', 'phone', 'name', 'message'], 'safe'],
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
        $query = SupportMessage::find()
            ->addOrderBy(['status' => SORT_ASC]);

        $dataProvider = new ActiveDataProvider([
            'query' => $query, 'sort' => ['defaultOrder' => ['id' => SORT_DESC]]
        ]);

        $this->load($params);

        if (!$this->validate()) {
            $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'created_by' => $this->created_by,
            'created_at' => $this->created_at,
        ]);

        if (!$this->status) {
            $query->andWhere(['status' => array_diff(array_keys(self::enum('status')), [self::STATUS_ARCHIVE])]);
        } else {
            $query->andWhere(['status' => $this->status]);
        }

        $query->andFilterWhere(['ilike', 'ip', $this->ip])
            ->andFilterWhere(['ilike', 'email', $this->email])
            ->andFilterWhere(['ilike', 'phone', $this->phone])
            ->andFilterWhere(['ilike', 'name', $this->name])
            ->andFilterWhere(['ilike', 'message', $this->message]);

        return $dataProvider;
    }
}
