<?php
use lo\widgets\Ajaxq;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Парсер';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="parser-index">
<?php    $form = ActiveForm::begin(); ?>

   <?php echo $model->metaFields->aut_id->getForm($form); ?>
   <?php echo $model->metaFields->dop->getForm($form); ?>

<?php ActiveForm::end(); ?>

<?php
echo Ajaxq::widget([
    'url' => '/love/parser/grab',
    'tpl' => '@vendor/loveorigami/lo-module-love/modules/admin/views/parser/import'
]);
?>
</div>
