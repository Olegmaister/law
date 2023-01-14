<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "example".
 *
 * @property int $id
 * @property string $title
 * @property int $status
 */
abstract class BaseExample extends \yii2custom\common\core\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'example';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title'], 'required'],
            [['status'], 'default', 'value' => null],
            [['status'], 'integer'],
            [['title'], 'string', 'max' => 255],
            [['title'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'title' => Yii::t('app', 'Title'),
            'status' => Yii::t('app', 'Status'),
        ];
    }
}
