<?php

    use yii\helpers\Html;
    use yii\bootstrap\ActiveForm;
?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <link href="<?= Yii::$app->request->baseUrl; ?>/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="<?= Yii::$app->request->baseUrl; ?>/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="<?= Yii::$app->request->baseUrl; ?>/build/css/custom.min.css" rel="stylesheet" type="text/css">
    <link href="<?= Yii::$app->request->baseUrl; ?>/css/custom.css" rel="stylesheet" type="text/css">
</head>
<body class="login">
<?php $this->beginBody() ?>
<div class="login_wrapper">
    <?= $content ?>
</div>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
