<?php
/* @var $this yii\web\View */
/* @var $model common\models\Page */

$this->title = Yii::t('backend', 'Create {modelClass}', [
    'modelClass' => 'Aphorism',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Aphorism'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="aphorism-create">

    <?php echo $this->render('_form', [
        'model' => $model
    ]) ?>

</div>
