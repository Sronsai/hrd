<?php

namespace frontend\assets;

use yii\web\AssetBundle;

class AppAsset extends AssetBundle {

    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/index.css',
        'css/bootstrap.css',
        //'css/bootstrap.min.css',
        //'css/clean-blog.css',
        'css/clean-blog.min.css',
        'css/font-awesome.min.css',
    ];
    public $js = [
        //'js/bootstrap.js',
        //'js/bootstrap.min.js',
        //'js/clean-blog.js',
        //'js/clean-blog.min.js',
        //'js/bootstrap.min.js',
        //'js/main.js',
        //'js/jquery.min.js',
        //'js/bootstrap-datepicker.th.js',
        'js/bootstrap-datepicker-thai.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];

}
