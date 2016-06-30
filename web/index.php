<?php

error_reporting(E_ALL & ~E_STRICT);

use yii\web\Application;
use Zelenin\Zend\Expressive\Config\Manager\Config;
use Zelenin\Zend\Expressive\Config\Provider\CacheProvider;

// Composer
require(__DIR__ . '/../vendor/autoload.php');

// Environment
require(__DIR__ . '/../common/env.php');

// Yii
require(__DIR__ . '/../vendor/yiisoft/yii2/Yii.php');

// Bootstrap application
require(__DIR__ . '/../common/config/bootstrap.php');
require(__DIR__ . '/../frontend/config/bootstrap.php');

$manager = new Config(
	require(__DIR__ . '/../frontend/config/app-local.php'),
    YII_DEBUG ? null : new CacheProvider(__DIR__ . '/../frontend/runtime/app-config.php')
);

(new Application($manager->getConfig()))->run();

