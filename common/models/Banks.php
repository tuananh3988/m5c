<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "banks".
 *
 * @property integer $id
 * @property string $account
 * @property string $name
 * @property integer $type
 */
class Banks extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'banks';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'account', 'name', 'type'], 'required'],
            [['id', 'type'], 'integer'],
            [['account', 'name'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'account' => 'Account',
            'name' => 'Name',
            'type' => 'Type',
        ];
    }
}
