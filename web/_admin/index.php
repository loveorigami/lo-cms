<?php
use yii\web\Application;
use Zelenin\Zend\Expressive\Config\Manager\Config;
use Zelenin\Zend\Expressive\Config\Provider\CacheProvider;

// Composer
require(__DIR__ . '/../../vendor/autoload.php');

// Environment
require(__DIR__ . '/../../common/env.php');

// Yii
require(__DIR__ . '/../../vendor/yiisoft/yii2/Yii.php');

// Bootstrap application
require(__DIR__ . '/../../common/config/bootstrap.php');
require(__DIR__ . '/../../backend/config/bootstrap.php');

$manager = new Config(
    require(__DIR__ . '/../../backend/config/app-local.php'),
    YII_DEBUG ? null : new CacheProvider(__DIR__ . '/../../backend/runtime/app-config.php')
);

(new Application($manager->getConfig()))->run();
