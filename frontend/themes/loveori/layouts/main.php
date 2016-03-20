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

<body class="boxed-layout ">
<?php $this->beginBody() ?>
<div class="wrapper row-offcanvas row-offcanvas-left">
    <?= $this->render('partials/header') ?>

    <!--=== Content Part ===-->
    <div class="container">
        <div class="row">
            <?= $this->render('partials/breadcrumbs') ?>
            <?= $content ?>
        </div>
    </div>

    <!--/container-->
    <!--=== End Content Part ===-->
    <?= $this->render('partials/footer') ?>

    <?= \lo\modules\noty\widgets\Noty::widget([
        'widget' => 'toastr', // noty
        'options' => [
/*
            // jNoty
             'dismissQueue' => true,
             'layout' => 'topRight',
             'timeout' => 2000,
             'theme' => 'relax',

             'animation' => [
                 'open' => 'animated flipInX',
                 'close' => 'animated flipOutX',
             ],
*/

            // toastr
            "closeButton" => false,
            "debug" => false,
            "newestOnTop" => true,
/*
            "progressBar" => false,
            "positionClass" => "toast-top-left",
            "preventDuplicates" => false,
            "onclick" => null,
            "showDuration" => "300",
            "hideDuration" => "1000",
            "timeOut" => "5000",
            "extendedTimeOut" => "1000",
            "showEasing" => "swing",
            "hideEasing" => "linear",
            "showMethod" => "fadeIn",
            "hideMethod" => "fadeOut"
*/
        ]
    ]); ?>


</div>
<!--/wrapper-->
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
