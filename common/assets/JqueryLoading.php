<?php
/**
 * Created by PhpStorm.
 * User: zein
 * Date: 8/2/14
 * Time: 11:40 AM
 */

namespace common\assets;


use yii\web\AssetBundle;

class JqueryLoading extends AssetBundle{
    public $sourcePath = '@vendor/bower/jquery-loading';
    public $css = [
        'dist/jquery.loading.css'
    ];
    public $js = [
        'dist/jquery.loading.js'
    ];
    public $depends = [
        '\yii\web\JqueryAsset',
    ];
}