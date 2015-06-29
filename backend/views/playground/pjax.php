<?php
use yii\helpers\Html;
use yii\widgets\Pjax;
/* @var $this yii\web\View */

$this->title = 'Pjax';
?>
<?php

$script = <<< JS
$(function() {

var i;
for (i=0; i<=10; i++){
    ajaxq_send(i);
}

for (i=0; i<=10; i++){
    ajax_send(i);
}

    function ajaxq_send(i){
        $.ajaxq ('test',{
            url: '/playground/get-time',
            type: 'post',
            dataType:"json",
            data: {
                date: (new Date()).getTime(),
                delay: i
            },
            success: function(response) {
                $('.res').append(response['delay']);
            }
        });
    }

    function ajax_send(i){
        $.ajax ({
            url: '/playground/get-time',
            type: 'post',
            dataType:"json",
            data: {
                date: (new Date()).getTime(),
                delay: i
            },
            success: function(response) {
                $('.res2').append(response['delay']);
            }
        });
    }

});
JS;

$this->registerJs($script);

?>

<div class="res">AjaxQ</div>
<div class="res2">Ajax</div>
