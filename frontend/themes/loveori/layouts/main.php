<?php
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use frontend\themes\loveori\assets\AppAsset;
use frontend\widgets\Alert;

/* @var $this \yii\web\View */
/* @var $content string */

AppAsset::register($this);
$this->registerJs('App.init();');

?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body class="boxed-layout container">
<?php $this->beginBody() ?>
<div class="wrapper row-offcanvas row-offcanvas-left">

    <?=$this->render('partials/header')?>
    <?=$this->render('partials/breadcrumbs')?>

    <!--=== Content Part ===-->
    <div class="container content">
        <div class="row">
            <?= $content ?>
        </div>
    </div>
    <!--/container-->
    <!--=== End Content Part ===-->
    <?=$this->render('partials/footer')?>
</div>
<!--/wrapper-->
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
