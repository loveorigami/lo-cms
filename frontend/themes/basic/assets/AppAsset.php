<?php
namespace frontend\themes\basic\assets;

use yii\web\AssetBundle;

/**
 * Class AppAsset
 * Ассеты темы
 * @package app\themes\demo\assets
 * @author Churkin Anton <webadmin87@gmail.com>
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot/themes/basic';
    public $baseUrl = '@web/themes/basic';
    public $css = ['css/styles.css'];
    public $js = [];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
