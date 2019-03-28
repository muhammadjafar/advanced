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
        // 'vendor/bootstrap/css/bootstrap.min.css',
        // 'vendor/fontawesome-free/css/all.min.css',
        // 'vendor/agency.min.css',
        // 'vendor/bootstrap/css/bootstrap.min.css',
        'css/site.css',
    ];
    public $js = [
        // 'qBootstrapValidation.js',
        // 'js/contact_me.js',
        // 'js/agency.min.js',
        // 'vendor/jquery/jquery.min.js',
        // 'vendor/bootstrap/js/bootstrap.bundle.min.js',
        // 'vendor/jquery-easing/jquery.easing.min.js',
        
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
