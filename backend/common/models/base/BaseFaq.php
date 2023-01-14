<?php

namespace common\models\base;

use common\models\Manager;
use Yii;

/**
 * This is the model class for table "faq".
 *
 * @property int $id
 * @property string $title
 * @property string $text
 * @property int $priority
 * @property int $created_by
 * @property int $updated_by
 * @property int $created_at
 * @property int $updated_at
 * @property string|null $type
 *
 * @property Manager $createdBy
 * @property Manager $updatedBy
 */
abstract class BaseFaq extends \yii2custom\common\core\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'faq';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'text'], 'required'],
            [['text'], 'string'],
            [['priority', 'created_by', 'updated_by', 'created_at', 'updated_at'], 'default', 'value' => null],
            [['priority', 'created_by', 'updated_by', 'created_at', 'updated_at'], 'integer'],
            [['title', 'type'], 'string', 'max' => 255],
            [['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => Manager::class, 'targetAttribute' => ['created_by' => 'id']],
            [['updated_by'], 'exist', 'skipOnError' => true, 'targetClass' => Manager::class, 'targetAttribute' => ['updated_by' => 'id']],
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
            'priority' => Yii::t('app', 'Priority'),
            'created_by' => Yii::t('app', 'Created by'),
            'updated_by' => Yii::t('app', 'Updated by'),
            'created_at' => Yii::t('app', 'Created at'),
            'updated_at' => Yii::t('app', 'Updated at'),
            'type' => Yii::t('app', 'Type'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCreatedBy()
    {
        return $this->hasOne(Manager::class, ['id' => 'created_by']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUpdatedBy()
    {
        return $this->hasOne(Manager::class, ['id' => 'updated_by']);
    }
}
