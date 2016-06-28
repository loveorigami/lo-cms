<?php
use lo\core\widgets\admin\CrudLinks;
use lo\core\widgets\admin\Grid;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\Breadcrumbs;

/**
 * @var yii\web\View $this
 * @var string $html html код меню
 */

$this->title = \Yii::t('backend', 'Category');
$this->params['breadcrumbs'][]=$this->title;

?>
<div class="category-index">

<?= CrudLinks::widget(["action" => CrudLinks::CRUD_LIST, "model" => $searchModel, "urlParams" => ["parent_id" => $parent_id]]) ?>
<?= $this->render('_filter', ['model' => $searchModel]); ?>

<?= Breadcrumbs::widget([
    'homeLink' => [
        "label" => $this->title,
        "url" => ["/" . Yii::$app->controller->route]
    ],
    'links' => $searchModel->getBreadCrumbsItems($parent_id, function ($model) {
        return ["/" . Yii::$app->controller->route, "parent_id" => $model->id];
    }),
]) ?>

<?php echo Grid::widget([
    'dataProvider' => $dataProvider,
    'model' => $searchModel,
    'tree' => true,
    /*    'userColumns' => [[
            'class' => \yii\grid\DataColumn::class,
            'header' => Yii::t('common', 'Child'),
            'value' => function ($model, $index, $widget) {
                return count($model->children(1)->all());
            }
        ]],*/
]); ?>

</div>