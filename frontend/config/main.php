<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-frontend',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log', 'plugins'],
    'controllerNamespace' => 'frontend\controllers',
    'as beforeAction' => [
        'class' => 'frontend\events\AppLayout'
    ],
    'modules' => [
        'page' => [
            'class' => 'lo\modules\page\Module',
            'defaultRoute' => 'page'
        ],
        // Configuration Yii2-User Frontend //
        'user' => [
            'class' => 'dektrium\user\Module',
            'enableFlashMessages' => false,
            'enableRegistration' => true,
            'enableUnconfirmedLogin' => false,
            'confirmWithin' => 21600,
            'cost' => 12,
        ],
    ],

    'components' => [
        'authManager' => [
            'class' => 'yii\rbac\DbManager',
            'defaultRoles' => ['user'],
        ],
        'plugins' => [
            'class' => 'lo\plugins\components\EventBootstrap',
            'appId' => 'frontend'
        ],
        'blocksProvider' => [
            'class' => 'lo\core\components\BlocksProvider',
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'urlManager' => require(__DIR__ . '/_urlManager.php'),
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'view' => [
            'class' => \lo\core\components\View::className(),
            'theme' => [
                'pathMap' => [
                    '@frontend/views' => '@frontend/themes/loveori',

                    '@frontend/views' => '@frontend/themes/basic',
                    '@frontend/modules' => '@frontend/themes/basic/modules',
                ]
            ],
        ],
    ],
    'params' => $params,
];
