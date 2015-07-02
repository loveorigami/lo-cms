<?php
use lo\widgets\Ajaxq;

/* @var $this yii\web\View */

$this->title = 'AjaxQ';
?>

<?php
echo Ajaxq::widget([
    'url' => '/playground/get-time'
]);

