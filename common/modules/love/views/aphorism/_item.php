<?php
use yii\helpers\Url;
use yii\helpers\Html;

?>


<div class="testimonials testimonials-v1" id="item-<?= $model->aggregate->model_id ?>-<?= $model->aggregate->target_id ?>">
    <div class="item" >
        <p><?= $model->text ?></p>

        <div class="testimonial-info">
            <?= Html::img('@storageUrl' . $model->aut->img, ['class' => 'rounded-x', 'alt' => $model->aut->name]); ?>
            <span class="testimonial-author">
                <?= Html::a($model->aut->name, Url::to(['/love/author/view', 'slug' => $model->aut->slug])) ?>
            </span>
        </div>
        <div class="pull-right">
        <?= \lo\modules\vote\widgets\Vote::widget([
            'model' => $model,
        ]);
        ?>
        </div>
    </div>
    <hr class="devider devider-dotted">
</div>





