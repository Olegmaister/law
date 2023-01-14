<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "practice".
 *
 * @property int $id
 * @property string $title
 * @property string $text
 * @property int $status
 */
abstract class BasePractice extends \yii2custom\common\core\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'practice';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'text'], 'required'],
            [['status'], 'default', 'value' => null],
            [['status'], 'integer'],
            [['title', 'text'], 'string', 'max' => 255],
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
            'text' => Yii::t('app', 'Text'),
            'status' => Yii::t('app', 'Status'),
        ];
    }
}
