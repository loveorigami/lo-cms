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
    'bootstrap' => ['log', 'plugins'],
    'controllerMap'=>[
        'elfinder' => [
            'class' => '\mihaildev\elfinder\PathController',
            'access' => ['admin'], //глобальный доступ к фаил менеджеру @ - для авторизорованных , ? - для гостей , чтоб открыть всем ['@', '?']
            'disabledCommands' => ['netmount'], //отключение ненужных команд https://github.com/Studio-42/elFinder/wiki/Client-configuration-options#commands
            'root' => [
                'baseUrl' => '@storageUrl',
                'basePath' => '@storage',
                'access' => ['read' => '*', 'write' => 'root'],
                'name' => ['category' => 'backend', 'message' => 'Category'], // Yii::t($category, $message)
                'driver'	 => 'LocalFileSystem',
                'options' => [
                    'tmbSize' => '48',
                    'acceptedName' => '/^[0-9a-z_\-.]+$/i', // i любой регистр только англ
                    'imgLib' => 'gd'
                ]
            ]
        ]
    ],
    'modules' => [
        'page' => [
            'class' => 'lo\modules\page\modules\admin\Module',
            'defaultRoute' => 'item'
        ],
        'sight' => [
            'class' => 'lo\modules\sight\modules\admin\Module',
            'defaultRoute' => 'town'
        ],
        'plugins' => [
            'class' => 'lo\plugins\Module',
            'pluginsDir'=>[
                '@common/plugins',
                '@lo/plugins/plugins',
            ]
        ],
        'user' => [
            'class' => 'dektrium\user\Module',
           // 'layout' => '@backend/views/layouts/common',
            'enableFlashMessages' => false,
            'enableRegistration' => false,
            'enableGeneratingPassword' => false,
            'enableConfirmation' => false,
            'enableUnconfirmedLogin' => false,
            'enablePasswordRecovery' => false,
            'confirmWithin' => 21600,
            'cost' => 12,
            'admins' => ['webmaster'],
        ],
        'admin' => [
            'class' => 'mdm\admin\Module',
            //'layout' => 'left-menu', // default null. other avaliable value 'right-menu' and 'top-menu'
            'controllerMap' => [
                'assignment' => [
                    'class' => 'mdm\admin\controllers\AssignmentController',
                    'userClassName' => 'dektrium\user\models\User',
                    'idField' => 'id', // id field of model User
                ],
            ]
        ],
        'i18n' => [
            'class' => 'backend\modules\i18n\Module',
            'defaultRoute' => 'i18n-message/index'
        ],

    ],
    'as access' => [
        'class' => 'mdm\admin\components\AccessControl',
        'allowActions' => [
            'page/item/update',
            'page/item/delete',
            'page/item/view',
            'site/error',
            'user/security/login',
            'user/security/logout'
        ]
    ],
    'components' => [
        'authManager' => [
            'class' => 'yii\rbac\DbManager', // or use 'yii\rbac\PhpManager'
        ],
        'plugins' => [
            'class' => 'lo\plugins\components\EventBootstrap',
            'appId' => 'backend'
        ],
        'translate' => [
            'class' => 'common\components\Translation',
            'key' => getenv('YANDEX_API_KEY'), // https://tech.yandex.ru/keys/
        ],
        'user' => [
            //'class' => 'dektrium\user\Module',
            'identityClass' => 'dektrium\user\models\User',
        ],
        'urlManager' => require(__DIR__ . '/_urlManager.php'),
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
    ],
    'params' => $params,
];
