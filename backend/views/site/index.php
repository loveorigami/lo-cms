<?php
/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>
<div class="site-index">

Админка

перевод через яндекс
    <pre>
     $data = Yii::$app->translate->translate('en-US', 'ru-RU', 'Hi everybody! My Dear friends! Go home!');
     echo $data['text'][0];
        <?= var_dump(Yii::$app->translate->translate('en-US', 'ru-RU', 'Hi everybody! My Dear friends! Go home')); ?>
    </pre>

</div>
