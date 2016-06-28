<?php
use yii\helpers\Html;
$this->title = Yii::t('backend', 'Create {modelClass}', [
    'modelClass' => 'Category',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Category'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="category-create">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>
