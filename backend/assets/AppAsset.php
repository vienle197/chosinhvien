<?php

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'https://fonts.googleapis.com/css?family=Hind:400,700',
        'css/bootstrap.min.css',
        'css/slick.css',
        'css/slick-theme.css',
        'css/nouislider.min.css',
        'css/font-awesome.min.css',
        'css/style.css',
    ];
    public $js = [
        'js/bootstrap.min.js',
//        'js/slick.min.js',
//        'js/nouislider.min.js',
//        'js/jquery.zoom.min.js',
        'js/main.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
