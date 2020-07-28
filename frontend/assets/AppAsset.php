<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        '/css/bootstrap.min.css',        
        '/css/fontastic.css',
        '/css/jquery.fancybox.min.css',
        '/css/style.default.css',
        '/css/custom.css',
    ];
    public $js = [
        'js/jquery.min.js',
        'js/popper.min.js',
        'js/bootstrap.min.js',        
        'js/fancybox/jquery.fancybox.min.js',
        'js/jquery.cookie.js',
        'js/front.js'
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
