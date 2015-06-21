<?php
use backend\widgets\Detail;
use backend\widgets\CrudLinks;
/**
* @var yii\web\View $this
*/

$this->title = Yii::t('backend', 'View');
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Pages'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="page-view">

    <p>
        <?=CrudLinks::widget(["action"=>CrudLinks::CRUD_VIEW, "model"=>$model])?>
    </p>

    <?=Detail::widget([
    'model' => $model,
    ]) ?>

</div>