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
            <?= Wrapper::widget([
			   'layerClass' => 'lo\modules\noty\widgets\layers\Noty',
				'layerOptions'=>[
					'registerAnimateCss' => false,
					'registerButtonsCss' => false
				],
				// clientOptions
				'options' => [
					'dismissQueue' => true,
					'layout' => 'topRight',
					'timeout' => 3000,
					'theme' => 'relax',

					// and more for this library...
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
