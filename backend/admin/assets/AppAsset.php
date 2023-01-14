<?php

namespace admin\assets;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $jsOptions = ['position' => \yii\web\View::POS_HEAD];
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/site.css',
    ];
    public $js = [
        '/js/site.js',
        // 'https://unpkg.com/vue',
        // 'https://unpkg.com/http-vue-loader
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap4\BootstrapPluginAsset',
        'djabiev\yii\assets\AutosizeTextareaAsset',
        'rmrevin\yii\fontawesome\AssetBundle',
        'kartik\file\FileInputAsset',
        AdminLteAsset::class
    ];
}