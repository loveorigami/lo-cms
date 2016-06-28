<?php
/* @var $this yii\web\View */
/* @var $model common\models\Page */

$this->title = Yii::t('backend', 'Create {modelClass}', [
    'modelClass' => 'Prim',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Prim'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="prim-create">

    <?php echo $this->render('_form', [
        'model' => $model
    ]) ?>

</div>
