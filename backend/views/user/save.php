<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

Yii::$app->view->title = 'Add User';
?>
<div class="">
    <div class="page-title">
        <div class="title_left">
            <h3>Form Add User</h3>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_content" style="display: block;">
                    <br>
                    <?php $form = ActiveForm::begin(['options' => ['class' => 'form-horizontal form-label-left', 'role' => 'form']]); ?>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Name <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <?= Html::activeTextInput($model, 'name', ['id' => 'name', 'class' => 'form-control col-md-7 col-xs-12']); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Email <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <?= Html::activeTextInput($model, 'email', ['id' => 'email', 'class' => 'form-control col-md-7 col-xs-12']); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="phone">Phone <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <?= Html::activeTextInput($model, 'phone', ['id' => 'phone', 'class' => 'form-control col-md-7 col-xs-12']); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="adress">Adress
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <?= Html::activeTextInput($model, 'adress', ['id' => 'adress', 'class' => 'form-control col-md-7 col-xs-12']); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="password">Password <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <?= Html::activePasswordInput($model, 'password', ['class' => 'form-control']); ?>
                            </div>
                        </div>
                        <div class="ln_solid"></div>
                        <div class="form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                <button type="submit" class="btn btn-success">Add</button>
                            </div>
                        </div>
                    <?php ActiveForm::end(); ?>
                </div>
            </div>
        </div>
    </div>
</div>
