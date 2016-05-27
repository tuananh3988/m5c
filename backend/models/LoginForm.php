<?php
namespace backend\models;
use Yii;
use yii\base\Model;
use common\models\Staffs;
/**
 * Login form
 */
class LoginForm extends Model
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
            [['id','password'], 'required', 'message' => \Yii::t('app', 'required')],
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
                $this->addError($attribute, \Yii::t('app', 'validation use'));
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
            $this->_user = Staffs::findByUsername($this->id);
        }

        return $this->_user;
    }
}