<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "staffs".
 *
 * @property integer $id
 * @property string $password
 * @property integer $auth_key
 */
class Staffs extends \yii\db\ActiveRecord
{
    public $id;
    public $password;
    public $rememberMe = true;

    private $_user;
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'staffs';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id','password'], 'required'],
            [['id', 'auth_key'], 'integer'],
            [['password'], 'string', 'max' => 255],
            ['rememberMe', 'boolean'],
            ['password', 'validatePassword'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'password' => 'Password',
            'auth_key' => 'Auth Key',
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
            if (!$user || !$user->validatePassword($this->password)) {
                $this->addError($attribute, 'Incorrect username or password.');
            }
        }
    }

    /**
     * Logs in a user using the provided username and password.
     *
     * @return boolean whether the user is logged in successfully
     */
    public function login()
    {
        if ($this->validate()) {
            return Yii::$app->user->login($this->getUser(), $this->rememberMe ? 3600 * 24 * 30 : 0);
        } else {
            return false;
        }
    }

    /**
     * Finds user by [[username]]
     *
     * @return User|null
     */
    protected function getUser()
    {
        if ($this->_user === null) {
            $this->_user = Backend::findByUsername($this->id);
        }

        return $this->_user;
    }
}
