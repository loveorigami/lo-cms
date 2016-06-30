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
    'bootstrap' => ['log', 'externalLinks'],
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
        'vote' => [
            'class' => lo\modules\vote\Module::class,
            'allowGuests' => false, // if true will check IP, otherwise - UserID
            'allowChangeVote' => true, // if true vote can be changed
            'models' => [ // matching model names with whatever unique integer ID
                3 => [
                    'modelName' => common\modules\love\models\Aphorism::class,
                    'allowGuests' => false,
                    'allowChangeVote' => true
                ]
                //'lo\modules\love\models\Aphorism' => 3, // or array with 'id' key
            ],
        ],
        'externallinks' =>[
            'class' => skeeks\yii2\externalLinks\ExternalLinksModule::class,
        ],
    ],

    'components' => [
        'authManager' => [
            'class' => 'yii\rbac\DbManager',
            'defaultRoles' => ['user'],
        ],
        /*        'plugins' => [
                    'class' => 'lo\plugins\components\EventBootstrap',
                    'appId' => 'frontend'
                ],*/
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
        'externalLinks' =>[
            'class' => 'skeeks\yii2\externalLinks\ExternalLinksComponent',
            //Additional
            'enabled' => true,
            'noReplaceLocalDomain' => true,
            'backendRoute' => '/externallinks/redirect/redirect',
            'backendRouteParam' => 'url',
            'enabledB64Encode' => true,
            'noReplaceLinksOnDomains' => [],
         ],
        'view' => [
            'class' => \lo\core\components\View::className(),
            'theme' => [
                'pathMap' => [
                    '@frontend/views' =>[
                        '@frontend/themes/bsorigami',
                        '@frontend/themes/basic',
                    ] ,
                    '@frontend/modules' => '@frontend/themes/basic/modules',
                ]
            ],
        ],
    ],
    'params' => $params,
];
