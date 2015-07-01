<?php
use yii\helpers\Html;
use lo\widgets\ajaxq\Ajaxq;

/* @var $this yii\web\View */

$this->title = 'Progress Bar';
?>

<?php

$script = <<< JS
    $(function() {

  var bar = $('div.progress-bar');
  var val = null;

  i1 = setInterval(function() {
    val = parseInt(bar.attr('aria-valuenow'));
    val += 10;
    console.log(val);
    if( val < 101) {
      bar.attr('aria-valuenow', val);
      bar.css('width', val + '%');
    } else {
      clearInterval(i1);
    }
  }, 1000);

 });
JS;

$this->registerJs($script);

?>

<?php
// stacked bars
echo \yii\bootstrap\Progress::widget([
    'percent' => 70,
    'barOptions' => ['class' => 'progress-bar-warning'],
    'options' => ['class' => 'progress-striped']
]);
?>

