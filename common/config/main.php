<?php

return [
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'language' => 'th', //Cannot be blank
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'thaiFormatter' => [
            'class' => 'dixonsatit\thaiYearFormatter\ThaiYearFormatter',
        ],
    ],
    'modules' => [
        'gridview' => [
            'class' => '\kartik\grid\Module'
// enter optional module parameters below - only if you need to  
// use your own export download action or custom translation 
// message source
// 'downloadAction' => 'gridview/export/download',
// 'i18n' => []
        ]
    ]
];
