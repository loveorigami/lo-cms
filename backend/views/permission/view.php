<?php
use backend\widgets\CrudLinks;
use backend\widgets\Detail;
use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var common\models\Permission $model
 */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => \Yii::t('common', 'Permissions'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="permission-view">

    <p>
        <?= CrudLinks::widget(["action" => CrudLinks::CRUD_VIEW, "model" => $model]) ?>
    </p>

    <?= Detail::widget([
        'model' => $model,
    ]) ?>

</div>