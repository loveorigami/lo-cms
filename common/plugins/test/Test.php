<?php

namespace common\plugins\test;

/**
 * Plugin Name: Test plugin
 * Plugin URI:
 * Version: 1.0
 * Description: Small test plugin
 * Author: Andrey Lukyanov
 * Author URI: https://github.com/loveorigami
 */
class Test
{
    /**
     * Application id, where plugin will be worked.
     * Support values: frontend, backend, common
     * Default: frontend
     * @var appId string
     */
    public static $appId = 'backend';

    /**
     * Default configuration for plugin.
     * @var config array()
     */

    public static $config = [
        'term' => 'Hello, world!',
    ];

    public static function events()
    {
        return [
            'yii\web\View' => [
                'beginBody' => ['foo', self::$config]
            ],
        ];
    }

    /**
     * handler method foo
     */
    public function foo($event)
    {
       // \yii\helpers\VarDumper::dump($event->sender, 10, true);
        //$event->sender->assetManager='';
         /*
         * yii\base\View => endPage
         * \yii\helpers\VarDumper::dump($event, 10, true);
         *
         * */
    }

    public function foo2($event)
    {
        $view = $event->sender;

        $bundle = TestAsset::register($view);

        $view->registerJs("
            if(typeof CKEDITOR != 'undefined'){
                CKEDITOR.plugins.addExternal('abbr', '$bundle->baseUrl/abbr/');
                CKEDITOR.replace('page-slug', {
                    //language: 'ru',
                    uiColor: '#9AB8F3',

                    // Load the abbr plugin.
                    extraPlugins: 'abbr',

                    // Disable Advanced Content Filter as the plugin does not implement it (yet).
                    allowedContent: true,

                    // The following options are set to make the sample more clear for demonstration purposes.

                    // Rearrange toolbar groups and remove unnecessary plugins.
                    toolbarGroups: [
                        { name: 'clipboard',   groups: [ 'clipboard', 'undo' ] },
                        { name: 'links' },
                        { name: 'insert' },
                        { name: 'document',	   groups: [ 'mode' ] },
                        '/',
                        { name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
                        { name: 'paragraph',   groups: [ 'list', 'indent' ] },
                        { name: 'styles' },
                        { name: 'about' }
                    ],
                    removePlugins: 'font,iframe,pagebreak,flash,stylescombo,print,preview,save,smiley,pastetext,pastefromword',
                    removeButtons: 'Anchor,Font,Strike,Subscript,Superscript'
                });
            }
        ", $view::POS_END);
///echo 1111;
        return false;
    }
}