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
        $term = ($event->data['term']) ? $event->data['term'] : self::$config['term'];

        if (isset($event->output)) {
            $content = $event->output;
            $event->output =  str_replace($term,"<h1>$term</h1>", $content);
        }

        return true;
    }
}