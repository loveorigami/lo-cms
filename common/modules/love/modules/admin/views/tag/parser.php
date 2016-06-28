<?php
use lo\widgets\Ajaxq;
use lo\core\widgets\admin\TabMenu;

/* @var $this yii\web\View */

$this->title = Yii::t('backend', 'Parser towns');
?>

<?php
echo Ajaxq::widget([
    'url' => '/love/tag/grab'
]);
