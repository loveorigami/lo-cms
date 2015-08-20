<?php
return [
    'name' => 'LoveOrigami',
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'sourceLanguage' => 'en-US',
    'language' => 'ru-RU',
    'modules' => [],
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'assetManager' => [
            'linkAssets'=>true,
            'basePath' => '@webroot/assets',
            'baseUrl' => '@web/assets',
            'appendTimestamp' => YII_ENV_DEV
        ],
        'formatter' => [
            'class' => 'yii\i18n\Formatter',
            'timeZone' => 'Europe/Moscow',
            'dateFormat' => 'php:d/m/Y',
            'timeFormat' => 'php:H:i:s',
            'datetimeFormat' => 'php:d/m/Y H:i:s',
            'decimalSeparator' => ',',
            'thousandSeparator' => ' ',
            // 'currencyCode' => 'EUR',
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                'db'=>[
                    'class' => 'yii\log\DbTarget',
                    'levels' => ['error', 'warning'],
                    'except'=>['yii\web\HttpException:*', 'yii\i18n\I18N\*'],
                    'prefix'=>function () {
                        $url = !Yii::$app->request->isConsoleRequest ? Yii::$app->request->getUrl() : null;
                        return sprintf('[%s][%s]', Yii::$app->id, $url);
                    },
                    'logVars'=>[],
                    'logTable'=>'{{%system_log}}'
                ]
            ],
        ],
        'i18n' => [
            'translations' => [
                'app'=>[
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath'=>'@common/messages',
                ],
                /* Uncomment this code to use DbMessageSource **/
                '*'=> [
                    'class' => 'yii\i18n\DbMessageSource',
                    'sourceMessageTable'=>'{{%i18n_source_message}}',
                    'messageTable'=>'{{%i18n_message}}',
                    'enableCaching' => YII_ENV_DEV,
                    'cachingDuration' => 3600,
                    'on missingTranslation' => ['\lo\modules\core\modules\i18n\Module', 'missingTranslation']
                ],
            ],
        ],
        'keyStorage' => [
            'class' => 'lo\core\components\keyStorage\KeyStorage'
        ],
    ],
];
