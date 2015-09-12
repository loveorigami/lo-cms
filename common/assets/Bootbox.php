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
        \Yii::$app->view->registerJs("
			
            yii.confirm = function(message, ok, cancel) {
				bootbox.confirm({ 
					className: 'modal-danger',
					message: message,
					animate: false,
					buttons: {
						cancel: {
							label: 'Отмена',
							className: 'btn-default'
						},
						confirm: {
							label: 'Да',
							className: 'btn-info'
						}
					},					
					callback: function(result){ 
						if (result) { !ok || ok(); } 
						else { !cancel || cancel(); } 
					}
				});
            }
        ");
    }
}