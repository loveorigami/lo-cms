<?php
use yii\helpers\Html;
use yii\widgets\Breadcrumbs;
?>

<!--=== Breadcrumbs ===-->
<div class="breadcrumbs">
    <div class="container">
        <h1 class="pull-left"><?= Html::encode($this->title) ?></h1>
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            'options' =>[
                'class' => 'pull-right breadcrumb'
            ]
        ]) ?>
    </div>
</div>
<!--/breadcrumbs-->
<!--=== End Breadcrumbs ===-->