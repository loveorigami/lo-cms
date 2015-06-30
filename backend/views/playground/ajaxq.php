<?php
use yii\helpers\Html;
use lo\widgets\ajaxq\Ajaxq;

/* @var $this yii\web\View */

$this->title = 'Pjax';
?>
<?php
echo Ajaxq::widget([
    'url' => '/playground/get-time',
    'success' => '$(".res").html(res["id"] + "</br>")'
]);

$script = <<< JS
    $(function() {

        $('#button-get').click(function(e){
             var from=$('#from').val();
             var to=$('#to').val();
             var i;
             var data = {};
             for (i=from; i<=to; i++){
                data['id'] = i;
                setAjaxq(data);
             }
;        });


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
<div class="res"></div>

<div class="row col-md-12">


    <div class="form-group col-md-6">
        <label for="from">From</label>
        <input type="text" class="form-control" id="from" placeholder="Enter from id" value="0">
    </div>
    <div class="form-group col-md-6">
        <label for="to">To</label>
        <input type="text" class="form-control" id="to" placeholder="Enter to id" value="5">
    </div>

    <button type="submit" id="button-get" class="btn btn-primary">Submit</button>
</div>

<div class="row col-md-12">
<pre>

use yii\helpers\Html;
use lo\widgets\ajaxq\Ajaxq;

/* @var $this yii\web\View */

$this->title = 'Pjax';

    echo Ajaxq::widget([
        'url' => '/playground/get-time',
        'success' =>'$(".res").append(res["id"] + "</br>")'
    ]);

    $script = <<< JS
    $(function() {

        $('#button-get').click(function(e){
             var from=$('#from').val();
             var to=$('#to').val();
             var i;
             var data = {};
             for (i=from; i<=to; i++){
                data['id'] = i;
                setAjaxq(data);
             }
;        });
    });

JS;

    $this->registerJs($script);

</pre>
</div>