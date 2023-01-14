<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "text".
 *
 * @property int $id
 * @property string $slug
 * @property string $value
 * @property string $page
 */
abstract class BaseText extends \yii2custom\common\core\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'text';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['slug', 'value', 'page'], 'required'],
            [['value'], 'string'],
            [['slug', 'page'], 'string', 'max' => 255],
            [['page', 'slug'], 'unique', 'targetAttribute' => ['page', 'slug']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'slug' => Yii::t('app', 'Slug'),
            'value' => Yii::t('app', 'Value'),
            'page' => Yii::t('app', 'Page'),
        ];
    }
}
