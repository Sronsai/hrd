<?php

$params = array_merge(
        require(__DIR__ . '/../../common/config/params.php'), require(__DIR__ . '/../../common/config/params-local.php'), require(__DIR__ . '/params.php'), require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-frontend',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'frontend\controllers',
    'components' => [
        /* 'urlManager' => [
          'class' => 'yii\web\urlManager',
          'enablePrettyUrl' => false,
          'showScriptName' => true,
          ], */
        'urlManagerBackend' => [
            'class' => 'yii\web\urlManager',
            'baseUrl' => '/hrd/backend/web',
            'scriptUrl' => '/hrd/backend/web/index.php',
            'enablePrettyUrl' => false,
            'showScriptName' => true,
        ],
        'formatter' => [   //กรณีไม่ให้แสดงผล (ไม่ได้ตั้ง) ในฐานข้อมูล
            'class' => 'yii\i18n\Formatter',
            'nullDisplay' => '',
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'thaiFormatter' => [
            'class' => 'dixonsatit\thaiYearFormatter\ThaiYearFormatter',
        ],
    ],
    'params' => $params,
];
