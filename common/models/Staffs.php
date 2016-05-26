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
            [['id'], 'required'],
            [['id', 'auth_key'], 'integer'],
            [['password'], 'string', 'max' => 255]
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
}
