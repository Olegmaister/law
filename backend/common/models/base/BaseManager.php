<?php

namespace common\models\base;

use common\models\Manager;
use Yii;

/**
 * This is the model class for table "manager".
 *
 * @property int $id
 * @property string $email
 * @property string $auth_key
 * @property string $password_hash
 * @property int $status
 * @property string|null $role
 * @property int $created_at
 * @property int $updated_at
 * @property int|null $created_by
 * @property int|null $updated_by
 *
 * @property Manager $createdBy
 * @property Manager $updatedBy
 */
abstract class BaseManager extends \yii2custom\common\core\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'manager';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['email', 'auth_key', 'password_hash'], 'required'],
            [['status', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'default', 'value' => null],
            [['status', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
            [['email', 'password_hash', 'role'], 'string', 'max' => 255],
            [['auth_key'], 'string', 'max' => 32],
            [['email'], 'unique'],
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
            'email' => Yii::t('app', 'Email'),
            'auth_key' => Yii::t('app', 'Auth key'),
            'password_hash' => Yii::t('app', 'Password hash'),
            'status' => Yii::t('app', 'Status'),
            'role' => Yii::t('app', 'Role'),
            'created_at' => Yii::t('app', 'Created at'),
            'updated_at' => Yii::t('app', 'Updated at'),
            'created_by' => Yii::t('app', 'Created by'),
            'updated_by' => Yii::t('app', 'Updated by'),
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
