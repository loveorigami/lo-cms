<?php
use backend\widgets\CrudLinks;
use backend\widgets\Detail;

/**
 * @var yii\web\View $this
 * @var common\models\Constraint $model
 */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => \Yii::t('common', 'Constraint'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="constraint-view">

    <p>
        <?= CrudLinks::widget(["action" => CrudLinks::CRUD_VIEW, "model" => $model]) ?>
    </p>

    <?= Detail::widget([
        'model' => $model,
    ]) ?>

</div>