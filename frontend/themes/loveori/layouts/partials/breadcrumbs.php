<?php
use yii\helpers\Html;
use yii\widgets\Breadcrumbs;
?>

<!--=== Breadcrumbs ===-->

        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            'options' =>[
                'class' => 'pull-right breadcrumb'
            ]
        ]) ?>

<!--/breadcrumbs-->
<!--=== End Breadcrumbs ===-->