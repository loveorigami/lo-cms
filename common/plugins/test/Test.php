<?php

namespace common\plugins\test;
use mihaildev\ckeditor\CKEditor;
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
    public static $appId = 'frontend';

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
            'yii\base\View' => [
                'afterRender' => ['foo', self::$config]
            ],
        ];
    }

    /**
     * handler method foo
     */
    public function foo($event)
    {
        $view = $event->sender;

        $view->registerJs("
            CKEDITOR.plugins.addExternal('abbr', 'file:///C:/Users/админ/Desktop/js/ckeditor/plugins/abbr/');
            CKEDITOR.editorConfig = function( config ) {
                config.extraPlugins = 'abbr';
            };
        ", $view::POS_END);


//CKEDITOR.plugins.addExternal( 'footnotes', 'file:///C:/Users/админ/Desktop/js/ckeditor/plugins/footnotes/' );

        return true;
    }
}