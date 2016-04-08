<?php

$config = [
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => getenv('BACKEND_COOKIE_VALIDATION_KEY')
        ],
    ],
];

if (getenv('YII_ENV') == 'dev') {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = 'yii\debug\Module';

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii']=[
		'class'=>'yii\gii\Module',
		'allowedIPs' => ['127.0.0.1', '46.173.65.127'],
        'generators' => [
            'crud' => [
                'class'=>'yii\gii\generators\crud\Generator',
                'templates'=>[
                    'yii2-loveorigami' => Yii::getAlias('@backend/views/_gii/templates')
                ],
                'template' => 'yii2-loveorigami',
                'messageCategory' => 'backend'
            ]
        ]
	];
}

return $config;
