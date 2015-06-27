<?php
use backend\widgets\CrudLinks;
use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var yii\data\ActiveDataProvider $dataProvider
 * @var common\models\Permission $searchModel
 */

$this->title = \Yii::t('core', 'Permissions');
$this->params['breadcrumbs'][] = $this->title;
?>


<div class="permission-index">

    <?= $this->render('_filter', ['model' => $searchModel]); ?>

    <hr/>

    <p>
        <?= CrudLinks::widget(["action" => CrudLinks::CRUD_LIST, "model" => $searchModel]) ?>
    </p>

    <?= $this->render('_grid', ['dataProvider' => $dataProvider, "searchModel" => $searchModel]); ?>


</div>
