<?php
return [
    'class'=>'yii\web\UrlManager',
    'enablePrettyUrl'=>true,
    'showScriptName'=>false,
    'rules'=> [
        // Pages
        //['pattern'=>'page/<slug>', 'route'=>'page/view'],

        '' => 'site/index',
        '~lo-redirect'                        => '/externallinks/redirect/redirect',
/*        'contact' => 'site/contact',
        //'<_a:(about|error)>' => 'main/default/<_a>',
        //'<_a:(login|logout|signup|confirm-email|request-password-reset|reset-password)>' => 'user/default/<_a>',

        'article/p<page:\d+>' => 'article/index',
        'article/<slug:[\w\-]+>' => 'article/view',
        'search/<q:[\w\-]+>' => 'search/default/index',
        'origami.php' => 'article/test',
        '<_c:[\w\-]+>' => '<_c>/index',*/

        // Articles
        ['pattern'=>'article/index', 'route'=>'article/index'],
        ['pattern'=>'article/attachment-download', 'route'=>'article/attachment-download'],
        ['pattern'=>'article/<slug>', 'route'=>'article/view'],

        // Api
        ['class' => 'yii\rest\UrlRule', 'controller' => 'api/v1/article', 'only' => ['index', 'view', 'options']],
        ['class' => 'yii\rest\UrlRule', 'controller' => 'api/v1/user', 'only' => ['index', 'view', 'options']],

        //Page
        //['pattern'=>'<slug>', 'route'=>'page/page/view'],
    ]
];
