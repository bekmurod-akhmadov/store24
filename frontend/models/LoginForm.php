<?php

namespace frontend\models;

use common\models\Customer;
use common\models\CustomerUser;
use Yii;
use yii\base\Model;

/**
 * Login form
 */
class LoginForm extends Model
{
    public $username;
    public $confirmation_code;
    public $rememberMe = true;

    private $_user;


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            // username and password are both required
            [['username', 'confirmation_code'], 'required'],
            // rememberMe must be a boolean value
            ['rememberMe', 'boolean'],
            // password is validated by validatePassword()
            ['confirmation_code', 'validatePassword'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'username' => 'Username',
            'confirmation_code' => 'Parol',
            'rememberMe' => 'Eslab qolish'
        ];
    }

    /**
     * Validates the password.
     * This method serves as the inline validation for password.
     *
     * @param string $attribute the attribute currently being validated
     * @param array $params the additional name-value pairs given in the rule
     */
    public function validatePassword($attribute, $params)
    {
        if (!$this->hasErrors()) {
            $user = $this->getUser();
            if (!$user || !$user->validatePassword($this->confirmation_code)) {
                $this->addError($attribute, 'Login yoki parol kiritilmadi');
            }
        }
    }

    /**
     * Logs in a user using the provided username and password.
     *
     * @return bool whether the user is logged in successfully
     */
    public function login()
    {
        if ($this->validate()) {
            return Yii::$app->user->login($this->getUser(), $this->rememberMe ? 3600  : 0);
        }

        return false;
    }

    /**
     * Finds user by [[username]]
     *
     * @return CustomerUser|null
     */
    protected function getUser()
    {
        if ($this->_user === null) {
            $this->_user = CustomerUser::findByUsername($this->username);
        }

        return $this->_user;
    }
}
