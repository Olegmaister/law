<?php

namespace admin\models\search;

use common\models\I18nSourceMessage;
use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * I18nSourceMessageSearch represents the model behind the search form of `common\models\I18nSourceMessage`.
 */
class I18nSourceMessageSearch extends I18nSourceMessage
{
    /** @var string */
    public $translation;

    public function init()
    {
        if (!$this->category) {
            $this->category = 'app';
        }

        parent::init();
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'created_at', 'updated_at'], 'integer'],
            [['category', 'message', 'translation'], 'safe'],
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
        $query = I18nSourceMessage::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => ['defaultOrder' => ['created_at' => SORT_DESC]]
        ]);

        $this->load($params);

        $this->created_at = strtotime($this->created_at) ?: null;
        $this->updated_at = strtotime($this->updated_at) ?: null;

        if (!$this->validate()) {
            $query->where('0=1');
            return $dataProvider;
        }

        if ($this->translation) {
            $query->innerJoinWith('messages')
                ->andWhere(['language' => \Yii::$app->language])
                ->andWhere(['like', 'translation', $this->translation]);
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'category' => $this->category
        ]);

        $query->andFilterWhere(['like', 'message', $this->message]);

        return $dataProvider;
    }
}