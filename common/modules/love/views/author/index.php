<?php

use common\modules\love\models\Category;
use yii\helpers\Url;
use sjaakp\alphapager\AlphaPager;
use yii\grid\GridView;

$this->title = Yii::t('frontend', 'Authors');
$this->params['breadcrumbs'][] = $this->title;

?>

<?= AlphaPager::widget([
    'dataProvider' => $dataProvider
]) ?>

<?= GridView::widget([
    'dataProvider' => $dataProvider,
    'columns' => [
        'name',
    ],
]); ?>

