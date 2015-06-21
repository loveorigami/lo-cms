<?php
/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>
<div class="site-index">

    перевод через яндекс   public function text($text, $source='en-US', $target='ru-RU')
    <pre>
     $data = Yii::$app->translate->text('Hi everybody! My Dear friends! Go home!');
     echo $data['text'][0];
        <?= var_dump(Yii::$app->translate->text('Hi everybody! My Dear friends! Go home')); ?>
    </pre>

</div>
