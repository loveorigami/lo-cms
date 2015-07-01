<?php
use yii\helpers\Html;
use lo\widgets\ajaxq\Ajaxq;

/* @var $this yii\web\View */

$this->title = 'Pjax';
?>

<?php
echo Ajaxq::widget([
    'url' => '/playground/get-time',
    'success' => '$(".res").html(res["mes"])'
]);

