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
    'bootstrap' => ['log', 'plugins', 'admin'],
    'controllerMap' => [
        'elfinder' => [
            'class' => '\mihaildev\elfinder\PathController',
            'access' => ['admin'], //глобальный доступ к фаил менеджеру @ - для авторизорованных , ? - для гостей , чтоб открыть всем ['@', '?']
            'disabledCommands' => ['netmount'], //отключение ненужных команд https://github.com/Studio-42/elFinder/wiki/Client-configuration-options#commands
            'root' => [
                'baseUrl' => '', // /uploads
                'basePath' => '@storage', // site.lo/uploads
                'access' => ['read' => '*', 'write' => 'root'],
                'name' => ['category' => 'backend', 'message' => 'Category'], // Yii::t($category, $message)
                'driver' => 'LocalFileSystem',
                'options' => [
                    'tmbSize' => '48',
                    'acceptedName' => '/^[0-9a-z_\-.]+$/i', // i любой регистр только англ
                    'imgLib' => 'gd'
                ]
            ]
        ],
        'elfinder-editor' => [
            'class' => '\mihaildev\elfinder\PathController',
            'access' => ['admin'], //глобальный доступ к фаил менеджеру @ - для авторизорованных , ? - для гостей , чтоб открыть всем ['@', '?']
            'disabledCommands' => ['netmount'], //отключение ненужных команд https://github.com/Studio-42/elFinder/wiki/Client-configuration-options#commands
            'root' => [
                'baseUrl' => '@editorUrl', // /uploads
                'basePath' => '@storage', // site.lo/uploads
                'access' => ['read' => '*', 'write' => 'root'],
                'name' => ['category' => 'backend', 'message' => 'Category'], // Yii::t($category, $message)
                'driver' => 'LocalFileSystem',
                'options' => [
                    'tmbSize' => '48',
                    'acceptedName' => '/^[0-9a-z_\-.]+$/i', // i любой регистр только англ
                    'imgLib' => 'gd'
                ]
            ]
        ]
    ],
    'modules' => [
        'plugins' => [
            'class' => 'lo\plugins\Module',
            'pluginsDir' => [
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
            'admins' => ['root'],
        ],
        'admin' => [
            'class' => 'mdm\admin\Module',
            'layout' => '@backend/views/layouts/main', // default null. other avaliable value 'right-menu' and 'top-menu'
        ],
    ],
    'as access' => [
        'class' => 'mdm\admin\classes\AccessControl',
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
            'cache' => 'cache', // класс компонента
        ],
        'plugins' => [
            'class' => 'lo\plugins\components\EventBootstrap',
            'appId' => 'backend'
        ],
        'translate' => [
            'class' => 'lo\core\components\Translation',
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