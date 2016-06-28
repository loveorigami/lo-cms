<?php
/* @var $this yii\web\View */
/* @var $model common\models\Page */

$this->title = Yii::t('backend', 'Create {modelClass}', [
    'modelClass' => 'Tag',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Tag'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tag-create">

    <?php echo $this->render('_form', [
        'model' => $model
    ]) ?>

</div>
