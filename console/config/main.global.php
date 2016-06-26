<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-console',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'console\controllers',
    'controllerMap'=>[
        'message'=>[
            'class'=>'console\controllers\ExtendedMessageController'
        ],
        'migrate'=>[
            'class'=>'yii\console\controllers\MigrateController',
            'migrationPath'=>'@common/migrations',
            'migrationTable'=>'{{%system_migration}}',
            'templateFile' => '@common/migrations/views/migration.php',
        ],
/*        'rbac'=>[
            'class'=>'console\controllers\RbacController'
        ]*/
    ],
    'params' => $params,
];
