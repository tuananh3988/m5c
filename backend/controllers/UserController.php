<?php
namespace backend\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use common\models\Users;

class UserController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['save'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    //'logout' => ['post'],
                ],
            ],
        ];
    }
    
    /**
    * Action save
    *
    * @date : 27/05/2016
    * @author : Nguyen Van Hien <nguyenvanhienbk2006@gmail.com>
    *
    */
    
   public function actionSave()
   {
       $model = new Users();
       return $this->render('save', [
           'model' => $model
       ]);
   }
}