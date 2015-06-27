<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var common\models\Permission $model
 */

$this->title = \Yii::t('common', 'Update Permission') . ': ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => \Yii::t('common', 'Permissions'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = \Yii::t('core', 'Update');
?>
<div class="permission-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

