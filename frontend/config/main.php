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
    'bootstrap' => ['log'],
    'controllerNamespace' => 'frontend\controllers',
    'modules' => [
        // Configuration Yii2-User Frontend //
        'user' => [
            'class' => 'dektrium\user\Module',
            'enableFlashMessages' => false,
            'enableRegistration' => false,
            'enableUnconfirmedLogin' => false,
            'confirmWithin' => 21600,
            'cost' => 12,
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
		'authClientCollection' => [
    'class' => yii\authclient\Collection::className(),
    'clients' => [
        'facebook' => [
            'class'        => 'dektrium\user\clients\Facebook',
            'clientId'     => 'CLIENT_ID',
            'clientSecret' => 'CLIENT_SECRET',
        ],
        'twitter' => [
            'class'          => 'dektrium\user\clients\Twitter',
            'consumerKey'    => 'CONSUMER_KEY',
            'consumerSecret' => 'CONSUMER_SECRET',
        ],
        'google' => [
            'class'        => 'dektrium\user\clients\Google',
            'clientId'     => 'CLIENT_ID',
            'clientSecret' => 'CLIENT_SECRET',
        ],
    ],
],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
    ],
    'params' => $params,
];
