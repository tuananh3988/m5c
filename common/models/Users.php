<?php

namespace common\models;

use Yii;
use common\models\BaseModel;
use yii\web\IdentityInterface;

/**
 * This is the model class for table "users".
 *
 * @property integer $id
 * @property string $password
 * @property string $email
 * @property string $phone
 * @property string $name
 * @property string $adress
 * @property integer $status
 * @property integer $parent_id
 * @property integer $level
 * @property string $create_date
 * @property string $update_date
 */
class Users extends \yii\db\ActiveRecord implements IdentityInterface 
{

    const STATUS_ACTIVE = 1;
    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'users';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['password', 'email', 'phone', 'name', 'status'], 'required', 'message' => \Yii::t('app', 'required')],
            [['status', 'parent_id', 'level'], 'integer'],
            [['create_date', 'update_date'], 'safe'],
            [['password', 'email', 'phone', 'name', 'adress'], 'string', 'max' => 255],
            [['email'], 'email', 'message' => \Yii::t('app', 'format')],
            ['phone', 'isNumeric'],
            [['password'], 'string', 'min' => 6, 'tooShort' => 'Please enter more than 6 characters']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'password' => 'Password',
            'email' => 'Email',
            'phone' => 'Phone',
            'name' => 'Name',
            'adress' => 'Adress',
            'status' => 'Status',
            'parent_id' => 'Parent ID',
            'level' => 'Level',
            'create_date' => 'Create Date',
            'update_date' => 'Update Date',
        ];
    }

    /*
     * @Auth Nguyen Van Hien (nguyenvanhienbk2006@gmail.com)
     * Create Date : 27/05/2016
     */

    public function isNumeric($attribute) {
        if (!is_numeric($this->phone)) {
            $this->addError($attribute, Yii::t('app', 'format number', ['attribute' => $this->attributeLabels()[$attribute]]));
        }
    }

    /**
     * @inheritdoc
     */
    public static function findIdentity($id) {
        return static::findOne(['id' => $id]);
    }

    /**
     * @inheritdoc
     */
    public static function findIdentityByAccessToken($token, $type = null) {
        throw new NotSupportedException('"findIdentityByAccessToken" is not implemented.');
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByEmail($email) {
        return static::findOne(['email' => $email, 'status' => self::STATUS_ACTIVE]);
    }

    /**
     * Finds user by password reset token
     *
     * @param string $token password reset token
     * @return static|null
     */
    public static function findByPasswordResetToken($token) {
        if (!static::isPasswordResetTokenValid($token)) {
            return null;
        }

        return static::findOne([
                    'password_reset_token' => $token,
                    'status' => self::STATUS_ACTIVE,
        ]);
    }

    /**
     * Finds out if password reset token is valid
     *
     * @param string $token password reset token
     * @return boolean
     */
    public static function isPasswordResetTokenValid($token) {
        if (empty($token)) {
            return false;
        }

        $timestamp = (int) substr($token, strrpos($token, '_') + 1);
        $expire = Yii::$app->params['user.passwordResetTokenExpire'];
        return $timestamp + $expire >= time();
    }

    /**
     * @inheritdoc
     */
    public function getId() {
        return $this->getPrimaryKey();
    }

    /**
     * @inheritdoc
     */
    public function getAuthKey() {
//        return $this->auth_key;
    }

    /**
     * @inheritdoc
     */
    public function validateAuthKey($authKey) {
//        return $this->getAuthKey() === $authKey;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return boolean if password provided is valid for current user
     */
    public function validatePassword($password) {
        return Yii::$app->security->validatePassword($password, $this->password);
    }

    /**
     * Generates password hash from password and sets it to the model
     *
     * @param string $password
     */
    public function setPassword($password) {
        $this->password_hash = Yii::$app->security->generatePasswordHash($password);
    }

    /**
     * Generates "remember me" authentication key
     */
    public function generateAuthKey() {
        $this->auth_key = Yii::$app->security->generateRandomString();
    }

    /**
     * Generates new password reset token
     */
    public function generatePasswordResetToken() {
        $this->password_reset_token = Yii::$app->security->generateRandomString() . '_' . time();
    }

    /**
     * Removes password reset token
     */
    public function removePasswordResetToken() {
        $this->password_reset_token = null;
    }

}
