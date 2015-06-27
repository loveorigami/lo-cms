<?php

/**
 * @var \yii\web\View $this
 * @var common\models\Permission $model
 */

$this->title = \Yii::t('common', 'Create Permission');
$this->params['breadcrumbs'][] = ['label' => \Yii::t('common', 'Permissions'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="permissions-create">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>
