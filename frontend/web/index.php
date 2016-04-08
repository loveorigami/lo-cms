<?php
use yii\web\Application;
use Zelenin\Zend\Expressive\Config\Manager\Config;
use Zelenin\Zend\Expressive\Config\Provider\CacheProvider;
use Zelenin\Zend\Expressive\Config\Provider\PhpProvider;

// Composer
require(__DIR__ . '/../../vendor/autoload.php');

// Environment
require(__DIR__ . '/../../common/env.php');

// Yii
require(__DIR__ . '/../../vendor/yiisoft/yii2/Yii.php');

// Bootstrap application
require(__DIR__ . '/../../common/config/bootstrap.php');
require(__DIR__ . '/../config/bootstrap.php');

$manager = new Config(
    [
        new PhpProvider(__DIR__ . '/../../common/config/{{,*.}global,{,*.}local}.php'),
        new PhpProvider(__DIR__ . '/../config/{{,*.}global,{,*.}local}.php'),
        new \lo\modules\sight\ModuleConfig(),
    ],
    YII_DEBUG ? null : new CacheProvider(__DIR__ . '/../runtime/app-config.php')
);

(new Application($manager->getConfig()))->run();

