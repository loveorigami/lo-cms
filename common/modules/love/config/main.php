<?php

return [
    'modules' => [
        'love' => [
            'class' => 'common\modules\love\Module',
            //'defaultRoute' => 'love/aphorism/index'
        ],
    ],

    'components'=>[
        'urlManager'=>[
            'rules'=>[
                //'aphorism/p<page:\d+>' => 'love/aphorism/index',
               // 'aphorism/<cat:[\w\-]+>' => 'love/aphorism/index',
               // 'aphorism/<slug:[\w\-]+>' => 'love/aphorism/view',
                'aphorism' => 'love/aphorism/index',

                //['pattern'=>'aphorism', 'route'=>'love/aphorism/index'],

                'story/<cat:[\w\-]+>' => 'love/story/index',
                'story/<slug:[\w\-]+>' => 'love/story/view',
                'story' => 'love/story/index',

                'love/author/<slug:[\w\-]+>' => 'love/author/view',
                'love/author' => 'love/author/index',
            ]
        ]
    ]

];