<?php

use backend\widgets\Grid;
use backend\widgets\CrudLinks;

$this->title = Yii::t('backend', 'Pages');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="page-index">

    <p>
        <?=CrudLinks::widget(["action"=>CrudLinks::CRUD_LIST, "model"=>$model])?>
    </p>

    <?php

    /**
     * @var yii\web\View $this
     * @var yii\data\ActiveDataProvider $dataProvider
     */
    echo Grid::widget([
        'dataProvider' => $dataProvider,
        'model' => $searchModel,
    ]);
    ?>

</div>
