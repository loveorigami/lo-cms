<?php
use lo\widgets\SlimScroll;
use kartik\touchspin\TouchSpin;

$script = <<< JS
    $(function() {

        $('#button-get').click(function(e){
             var data = {};

             data['id'] = parseInt($('#from').val());
             data['aut_id'] = parseInt($('#parser-aut_id option:selected').val());

             data['to_db'] = $('#to_db:checked').val();
             data['glue'] = $('#glue:checked').val();
             data['upd_aut'] = $('#upd_aut:checked').val();
             data['from_file'] = $('#from_file:checked').val();

             data['id_lib'] = $('#id_lib').val();
             data['file'] = $('#parser-dop').val();

             setAjaxq(data);
        });

 });
JS;

$this->registerJs($script);

?>

<div class="row">
    <div class="col-md-12">
        <div class="form-group col-md-8">
            <label for="from">Ссылка http://www.e-reading.ws/chapter.php/22166/ -ID- /Ermishin_-_Aforizmy.html</label>
           <?php
           // Vertical button alignment
           $value = \Yii::$app->settings->get('love.parser.page');

            echo TouchSpin::widget([
            'name' => 't6',
            'id'=>'from',
            'value'=>$value,
            'pluginOptions' => [
                'verticalbuttons' => true,
                'max' => 1500,
            ]
            ]);
           ?>
        </div>
        <div class="form-group col-md-1">
            <label>Вставить в базу</label>
            <input type="checkbox" checked="checked" value="1" id="to_db" name="to_db">
        </div>
        <div class="form-group col-md-1">
            <label>Склеить строки?</label>
            <input type="checkbox" value="1" id="glue" name="glue">
        </div>
        <div class="form-group col-md-1">
            <label>Обновить автора?</label>
            <input type="checkbox" value="1" id="upd_aut" name="upd_aut">
        </div>

        <div class="form-group col-md-12">
            <input type="hidden" value="83" id="id_lib" name="id_lib">
            <button type="submit" id="button-get" class="btn btn-primary">Submit</button>
        </div>
    </div>
</div>
<?= SlimScroll::widget([
    'options'=>[
        'height'=>'500px'
    ]
]);
?>
<div class="row col-md-12">
    <div class="res"></div>
</div>
<?= SlimScroll::end(); ?>