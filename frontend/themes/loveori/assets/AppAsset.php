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
    public $css = ['css/styles.css'];
    public $js = [];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
