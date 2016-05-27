<?php
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="animate form login_form">
    <section class="login_content">
        <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>
        <?php $err = $model->getErrors();?>
        <h1><?= Html::encode($this->title) ?></h1>
        <?php if ($err) : ?>
            <div class = "mBoxitem_txt txtWarning">
                <ul>
                    <?php foreach ($err as $key => $value) : ?>
                        <li><?php echo $value[0] ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>
        <div>
            <?= Html::activeTextInput($model, 'username', ['class' => 'form-control', 'placeholder' => 'Username']); ?>
        </div>
        <div>
            <?= Html::activePasswordInput($model, 'password', ['class' => 'form-control', 'placeholder' => 'Password', 'id' => 'password']); ?>
        </div>
        <div>
            <?= Html::submitButton('Log in', ['class' => 'btn btn-default submit']); ?>
            <a class="reset_pass" href="#">Lost your password?</a>
        </div>
        <div class="clearfix"></div>
        <div class="separator">
            <div>
                <p>©2016 All Rights Reserved.</p>
            </div>
        </div>
        <?php ActiveForm::end(); ?>
    </section>
</div>
