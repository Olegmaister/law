<?php

namespace common\models\base;

use common\models\Manager;
use Yii;

/**
 * This is the model class for table "support_message".
 *
 * @property int $id
 * @property string|null $ip
 * @property string|null $email
 * @property string|null $phone
 * @property string|null $name
 * @property string $message
 * @property int $status
 * @property int|null $created_by
 * @property int $created_at
 * @property string|null $info
 * @property string|null $referrer
 * @property string|null $url
 *
 * @property Manager $createdBy
 */
abstract class BaseSupportMessage extends \yii2custom\common\core\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'support_message';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ip'], 'string'],
            [['message', 'status'], 'required'],
            [['status', 'created_by', 'created_at'], 'default', 'value' => null],
            [['status', 'created_by', 'created_at'], 'integer'],
            [['info'], 'safe'],
            [['email', 'name'], 'string', 'max' => 255],
            [['phone'], 'string', 'max' => 30],
            [['message'], 'string', 'max' => 2000],
            [['referrer', 'url'], 'string', 'max' => 1000],
            [['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => Manager::class, 'targetAttribute' => ['created_by' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'ip' => Yii::t('app', 'Ip'),
            'email' => Yii::t('app', 'Email'),
            'phone' => Yii::t('app', 'Phone'),
            'name' => Yii::t('app', 'Name'),
            'message' => Yii::t('app', 'Message'),
            'status' => Yii::t('app', 'Status'),
            'created_by' => Yii::t('app', 'Created by'),
            'created_at' => Yii::t('app', 'Created at'),
            'info' => Yii::t('app', 'Info'),
            'referrer' => Yii::t('app', 'Referrer'),
            'url' => Yii::t('app', 'Url'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCreatedBy()
    {
        return $this->hasOne(Manager::class, ['id' => 'created_by']);
    }
}
