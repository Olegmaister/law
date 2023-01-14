<?php
namespace admin\models\forms;

use Yii;
use yii\base\Model;
use common\models\Manager;

/**
 * Login form
 */
class LoginForm extends Model
{
    public $email;
    public $password;

    private $_user = null;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['email', 'password'], 'required'],
            ['password', 'validatePassword'],
        ];
    }

    /**
     * Validates the password.
     * This method serves as the inline validation for password.
     */
    public function validatePassword()
    {
        if (!$this->hasErrors()) {
            $user = $this->getUser();
            if (!$user || !$user->validatePassword($this->password)) {
                $this->addError('password', 'Incorrect email or password.');
            }
        }
    }

    /**
     * Logs in a user using the provided email and password.
     *
     * @return boolean whether the user is logged in successfully
     */
    public function login()
    {
        if ($this->validate()) {
            return Yii::$app->user->login($this->getUser(), 0);
        } else {
            return false;
        }
    }

    /**
     * Finds user by [[email]]
     *
     * @return Manager|null
     */
    public function getUser()
    {
        if ($this->_user === null) {
            $this->_user = Manager::findByEmail($this->email);
        }

        return $this->_user;
    }
}