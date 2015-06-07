<?php
use backend\assets\AppAsset;
use yii\helpers\Html;

/* @var $this \yii\web\View */
/* @var $content string */

\backend\assets\BackendAsset::register($this);
?>

<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>"/>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body class="login-page">
<div class="login-box"></div>
<div class="login-logo">
    <a href="#"><b>Love</b>Origami</a>
</div>

<?php $this->beginBody() ?>

<?= $content ?>

<?php $this->endBody() ?>

</body>
</html>
<?php $this->endPage() ?>
