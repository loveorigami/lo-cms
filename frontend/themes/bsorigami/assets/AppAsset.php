<?php
namespace frontend\themes\bsorigami\assets;

use yii\web\AssetBundle;

/**
 * Class AppAsset
 * Ассеты темы
 * @package frontend\themes\bsorigami\assets
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot/themes/bsorigami';
    public $baseUrl = '@web/themes/bsorigami';
    public $css = ['css/styles.css'];
    public $js = [
        'js/jquery.slides.min.js',
        'js/custom.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapPluginAsset',
        'common\assets\FontAwesome',
        'common\assets\JqueryLoading',
    ];
}
