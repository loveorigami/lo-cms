<?php

return [
    'modules' => [
        'love' => [
            'controllerNamespace'=>'common\modules\love\controllers',
            'class' => common\modules\love\Module::class,
            'defaultRoute' => 'love/aphorism/index'
        ],
    ],

    'components'=>[
        'urlManager'=>[
            'rules'=>[
                ['pattern'=>'aphorism/<slug:[\w\-]+>', 'route'=>'love/aphorism/view'],
                ['pattern'=>'aphorism/<cat:[\w\-]+>', 'route'=>'love/aphorism/index'],
                ['pattern'=>'aphorism', 'route'=>'love/aphorism/index'],

                //'story/<cat:[\w\-]+>' => 'love/story/index',
                //'story/<slug:[\w\-]+>' => 'love/story/view',
                //'story' => 'love/story/index',

                //'love/author/<slug:[\w\-]+>' => 'love/author/view',
                //'love/author' => 'love/author/index',
            ]
        ]
    ]

];