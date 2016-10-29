<?php

$params = array_merge(
        require(__DIR__ . '/../../common/config/params.php'), require(__DIR__ . '/../../common/config/params-local.php'), require(__DIR__ . '/params.php'), require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-backend',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'backend\controllers',
    'bootstrap' => ['log'],
    'language' => 'ru',
    'modules' => [
        'db-manager' => [
            'class' => 'bs\dbManager\Module',
            'path' => '@app/backups',
            'dbList' => ['db'],
        //'dbList' => ['db', 'db1', 'db2'],
        // additional mysqldump/pg_dump presets (available for choosing in dump and restore forms)
        /* 'customDumpOptions' => [
          'mysqlForce' => '--force',
          'somepreset' => '--triggers --single-transaction',
          'pgCompress' => '-Z2 -Fc',
          ],
          'customRestoreOptions' => [
          'mysqlForce' => '--force',
          'pgForce' => '-f -d',
          ],
          // options for full customizing default command generation
          //'mysqlManagerClass' => 'CustomClass',
          'postgresManagerClass' => 'CustomClass',
          // option for add additional DumpManagers
          'createManagerCallback' => function($dbInfo) {
          if ($dbInfo['dbName'] == 'exclusive') {
          return new MyExclusiveManager;
          } else {
          return false;
          }
          } */
        ],
    ],
    'components' => [
        /* 'urlManager' => [
          'class' => 'yii\web\urlManager',
          'enablePrettyUrl' => false,
          'showScriptName' => true,
          ], */
        'urlManagerFrontend' => [
            'class' => 'yii\web\urlManager',
            'baseUrl' => '/hrd/frontend/web',
            'scriptUrl' => '/hrd/frontend/web/index.php',
            'enablePrettyUrl' => false,
            'showScriptName' => true,
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
    ],
    'params' => $params,
];
