<?php
namespace frontend\themes\loveori\assets;

use yii\web\AssetBundle;

/**
 * Class AppAsset
 * Ассеты темы
 * @package app\themes\demo\assets
 * @author Churkin Anton <webadmin87@gmail.com>
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot/themes/loveori';
    public $baseUrl = '@web/themes/loveori';
    public $css = [

        // Web Fonts
        '//fonts.googleapis.com/css?family=Open+Sans:400,300,600&subset=cyrillic,latin',

        // CSS Global Compulsory
        'css/style.css',

        // CSS Header and Footer
        'css/headers/header-default.css',
        'css/footers/footer-v1.css',

        // CSS Theme
        'css/theme-colors/blue.css',

        // CSS Customization
        'css/custom.css',
        'css/bootstrap-theme.css',

    ];
    public $js = [
        //'plugins/jquery/jquery-migrate.min.js',
        'plugins/back-to-top.js',
        'js/app.js',
        'js/custom.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        //'yii\bootstrap\BootstrapAsset',
        'yii\bootstrap\BootstrapPluginAsset',
        'common\assets\FontAwesome',
        'common\assets\JqueryLoading',
    ];
}
