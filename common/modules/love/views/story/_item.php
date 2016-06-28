<?php
use yii\helpers\Url;
use yii\helpers\Html;

?>


<div class="testimonials testimonials-v1" id="item-<?= $model->aggregate->model_id ?>-<?= $model->aggregate->target_id ?>">
    <div class="item" >
        <p><?= $model->name ?></p>


        <div class="pull-right">
        <?= \lo\modules\vote\widgets\Vote::widget([
            'model' => $model,
        ]);
        ?>
        </div>
    </div>
    <hr class="devider devider-dotted">
</div>





