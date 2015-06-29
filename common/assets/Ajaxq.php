<?php

namespace common\assets;

use yii\web\AssetBundle;

class Ajaxq extends AssetBundle
{
    public $sourcePath = '@vendor/bower/ajaxq';
    public $js = [
        'ajaxq.js'
    ];
    public $depends = [
        'yii\web\JqueryAsset',
    ];

}