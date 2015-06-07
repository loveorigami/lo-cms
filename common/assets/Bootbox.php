<?php

namespace common\assets;

use yii\web\AssetBundle;

class Bootbox extends AssetBundle
{
    public $sourcePath = '@vendor/bower/bootbox';
    public $js = [
        'bootbox.js'
    ];
    public $depends = [
        'yii\bootstrap\BootstrapAsset',
    ];

    public static function overrideSystemConfirm()
    {
        \Yii::$app->view->registerJs('
            yii.confirm = function(message, ok, cancel) {
                bootbox.confirm(message, function(result) {
                    if (result) { !ok || ok(); } else { !cancel || cancel(); }
                });
            }
        ');
    }
}