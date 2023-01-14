<?php

namespace common\models;

use common\models\base\BaseManager;
use Yii;
use yii\web\IdentityInterface;

/**
 * This is the model class for table "manager".
 *
 * @property string $password write-only password
 * @property-read bool $isSuperAdmin
 */
class Manager extends BaseManager implements IdentityInterface
{
    const ROLE_ADMIN = 'admin';

    const STATUS_DELETED = -1;
    const STATUS_DRAFT = 0;
    const STATUS_ACTIVE = 10;

    protected $password;

    /**
     * {@inheritdoc}
     */
    public static function titleAttribute()
    {
        return 'email';
    }

    /**
     * {@inheritdoc}
     */
    public function writeonly()
    {
        return ['password'];
    }

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
        return array_merge(parent::rules(), [
            [['status'], 'default', 'value' => self::STATUS_ACTIVE],
            [['password'], 'string', 'min' => 8, 'max' => 16],
            [['email'], 'email'],
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentity($id)
    {
        return static::findOne(['id' => $id, 'status' => self::STATUS_ACTIVE]);
    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        return static::findOne(['auth_key' => $token, 'status' => self::STATUS_ACTIVE]);
    }

    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->getPrimaryKey();
    }

    /**
     * {@inheritdoc}
     */
    public function getAuthKey()
    {
        return $this->auth_key;
    }

    /**
     * {@inheritdoc}
     */
    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }

    public static function findByEmail(string $email)
    {
        return static::findOne(['email' => $email, 'status' => self::STATUS_ACTIVE]);
    }

    public function validatePassword(string $password)
    {
        return Yii::$app->security->validatePassword($password, $this->password_hash);
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setPassword(string $password)
    {
        $this->password = $password;
        $this->password_hash = Yii::$app->security->generatePasswordHash($password);
        $this->auth_key = Yii::$app->security->generateRandomString();
    }
}