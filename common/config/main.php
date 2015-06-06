<?php
return [
    'name' => 'LoveOrigami',
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'sourceLanguage' => 'en-US',
    'language' => 'ru-Ru',
    'modules' => [
        'rbac' => [
            'class' => 'dektrium\rbac\Module',
            'enableFlashMessages' => false,
            'admins'=>['webmaster'],
        ],
    ],
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'assetManager' => [
            'linkAssets'=>true,
            'basePath' => '@webroot/assets',
            'baseUrl' => '@web/assets'
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
    ],
];
