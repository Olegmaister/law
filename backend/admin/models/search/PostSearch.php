<?php

namespace admin\models\search;

use common\models\Post;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use yii2custom\common\core\ActiveRecord;

/**
 * PostSearch represents the model behind the search form of `common\models\Post`.
 */
class PostSearch extends Post
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'post_category_id', 'meta_id', 'created_by', 'updated_by', 'created_at', 'updated_at',
                'published_at', 'status', 'views'], 'integer'],
            [['slug', 'title', 'preview', 'text', 'type'], 'safe'],
            [['in_menu', 'in_bottom_menu', 'in_editors_choice'], 'boolean'],
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
        $query = static::query($params['type'] ?? null);
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => ['defaultOrder' => $query->defaultOrder],
            'pagination' => ['pageSize' => 100],
        ]);

        $params['status'] = $params['status']
            ?? self::STATUS_PUBLISHED;

        if (!$this->load($params) || !$this->validate()) {
            $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'post_category_id' => $this->post_category_id,
            'meta_id' => $this->meta_id,
            'in_menu' => $this->in_menu,
            'in_bottom_menu' => $this->in_bottom_menu,
            'in_editors_choice' => $this->in_editors_choice,
            'created_by' => $this->created_by,
            'updated_by' => $this->updated_by,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'published_at' => $this->published_at,
            'status' => $this->status,
            'views' => $this->views,
        ]);

        $query->andFilterWhere(['ilike', 'slug', $this->slug])
            ->andFilterWhere(['ilike', 'title', $this->title])
            ->andFilterWhere(['ilike', 'preview', $this->preview])
            ->andFilterWhere(['ilike', 'text', $this->text])
            ->andFilterWhere(['ilike', 'type', $this->type]);

        return $dataProvider;
    }
}
