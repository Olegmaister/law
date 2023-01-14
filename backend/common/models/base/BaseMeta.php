<?php

namespace common\models\base;

use common\models\Post;
use Yii;

/**
 * This is the model class for table "meta".
 *
 * @property int $id
 * @property string|null $title
 * @property string|null $description
 * @property string|null $custom
 * @property string|null $url
 *
 * @property Post[] $posts
 */
abstract class BaseMeta extends \yii2custom\common\core\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'meta';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['custom'], 'string'],
            [['title', 'description'], 'string', 'max' => 255],
            [['url'], 'string', 'max' => 1000],
            [['url'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'title' => Yii::t('app', 'Title'),
            'description' => Yii::t('app', 'Description'),
            'custom' => Yii::t('app', 'Custom'),
            'url' => Yii::t('app', 'Url'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPosts()
    {
        return $this->hasMany(Post::class, ['meta_id' => 'id']);
    }
}
