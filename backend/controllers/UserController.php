<?php

namespace backend\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use common\models\Users;

class UserController extends Controller {

    /**
     * @inheritdoc
     */
    public function behaviors() {
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
    public function actionSave() {
        $request = Yii::$app->request;
        $model = new Users();
        if ($request->isPost) {
            $dataPost = $request->Post();
            $model->status = 1;
            $model->parent_id = 0;
            $model->level = 0;
            $model->create_date = date('Y-m-d H:i:s');
            $model->load($dataPost);
            if ($model->validate()) {
                $model->password = Yii::$app->security->generatePasswordHash($model->password);
                if ($model->save()) {
                    return $this->goHome();
                }
            }
        }
        return $this->render('save', [
                    'model' => $model
        ]);
    }

}
