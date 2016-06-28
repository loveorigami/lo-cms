<?php
use lo\core\widgets\admin\CrudLinks;
use lo\core\widgets\admin\Detail;
use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var app\modules\catalog\models\CatalogSection $model
 */

$this->title = $model->getItemLabel();
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Category'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="category-view">

        <?= CrudLinks::widget(["action" => CrudLinks::CRUD_VIEW, "model" => $model]) ?>

    <?= Detail::widget([
        'model' => $model,
    ]) ?>

</div>