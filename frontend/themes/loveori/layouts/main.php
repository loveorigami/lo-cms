<?php
use yii\helpers\Html;
use frontend\themes\loveori\assets\AppAsset;
use lo\modules\noty\widgets\Wrapper;

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
            <?php
/**/        \Yii::$app->getSession()->setFlash('error', 'noty error');
            \Yii::$app->getSession()->setFlash('info', 'noty info');
            \Yii::$app->getSession()->setFlash('success', 'ajax success');
            \Yii::$app->getSession()->setFlash('warning', 'ajax warning');
            ?>
            <?= Wrapper::widget([
                'layerClass' => 'lo\modules\noty\widgets\layers\Notifyjs',
                'options' => [
                    // whether to hide the notification on click
                    'clickToHide' => true,

                    // whether to auto-hide the notification
                    'autoHide' => true,

                    // if autoHide, hide after milliseconds
                    'autoHideDelay' => 5000,

                    // show the arrow pointing at the element
                    'arrowShow' => true,

                    // arrow size in pixels
                    'arrowSize' => 5,

                    // position defines the notification position though uses the defaults below
                    'position' => 'top right',

                    // default style
                    'style' => 'bootstrap',

                    // show animation
                    'showAnimation' => 'slideDown',

                    // show animation duration
                    'showDuration' => 400,

                    // hide animation
                    'hideAnimation' => 'slideUp',

                    // hide animation duration
                    'hideDuration' => 200,

                    // padding between element and notification
                    'gap' => 50
                ],
            ]); ?>
            <?= $this->render('partials/breadcrumbs') ?>
            <?= $content ?>
        </div>
    </div>

    <!--/container-->
    <!--=== End Content Part ===-->
    <?= $this->render('partials/footer') ?>

</div>
<!--/wrapper-->
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
