<?php

namespace common\models;

use Yii;
use common\models\BaseModel;

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
class Users extends BaseModel
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'users';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
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
    public function attributeLabels()
    {
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
    
    public function isNumeric($attribute)
    {
        if (!is_numeric($this->phone)){
            $this->addError($attribute, Yii::t('app', 'format number' ,['attribute' => $this->attributeLabels()[$attribute]]));
        }
    }
}
