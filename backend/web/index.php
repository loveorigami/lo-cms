<?php
// Composer
require(__DIR__ . '/../../vendor/autoload.php');

// Environment
require(__DIR__ . '/../../common/env.php');

// Yii
require(__DIR__ . '/../../vendor/yiisoft/yii2/Yii.php');

// Bootstrap application
require(__DIR__ . '/../../common/config/bootstrap.php');
require(__DIR__ . '/../config/bootstrap.php');

$config = yii\helpers\ArrayHelper::merge(
    require(__DIR__ . '/../../common/config/main.global.php'),
    require(__DIR__ . '/../../common/config/main.local.php'),
    require(__DIR__ . '/../config/main.global.php'),
    require(__DIR__ . '/../config/main.local.php'),
    \lo\core\helpers\ConfigHelper::getModulesConfigs($params["enabledModules"])
);

$application = new yii\web\Application($config);
$application->run();
