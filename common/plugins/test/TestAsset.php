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
use yii\web\AssetBundle;

class TestAsset extends AssetBundle
{
    public $sourcePath = '@common/plugins/test/plugins';
}