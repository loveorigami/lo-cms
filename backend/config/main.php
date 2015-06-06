<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-backend',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'backend\controllers',
    'bootstrap' => ['log'],
    'modules' => [
        'user' => [
            'class' => 'dektrium\user\Module',
            'enableFlashMessages' => false,
            'enableRegistration' => false,
            'enableUnconfirmedLogin' => false,
            'confirmWithin' => 21600,
            'cost' => 12,
            'admins' => ['webmaster']
        ],
    ],

    'components' => [
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
		'urlManager'=>require(__DIR__.'/_urlManager.php'),
/*        'session' => [
            'name' => 'BACKENDSESSID',
        ],*/
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
    ],
    'params' => $params,
];
