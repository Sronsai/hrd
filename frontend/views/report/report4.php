<?php
/* @var $this yii\web\View */

use fedemotta\datatables\DataTables;
use kartik\grid\GridView;
use yii\helpers\ArrayHelper;
use kartik\export\ExportMenu;

$this->title = 'ตำแหน่งเฉพาะด้าน รพ.เชียงคาน';

//use yii\helpers\Url;

$this->params['breadcrumbs'][] = ['label' => 'รายงาน', 'url' => ['/report/index']];
$this->params['breadcrumbs'][] = 'ตำแหน่งเฉพาะด้าน รพ.เชียงคาน';
?>

<div class="report">
    <center><h1><u>ตำแหน่งเฉพาะด้าน รพ.เชียงคาน</u></h1></center>

    <div class="row">
        <div class="panel panel-default">
            <div class="panel-body">
                <?php
//echo yii\grid\GridView::widget([
                //echo kartik\grid\GridView::widget([
                echo DataTables::widget([
                    'dataProvider' => $dataProvider,
                    'columns' => [
                        [
                            'header' => 'ลำดับ',
                            'class' => 'yii\grid\SerialColumn',
                            'options' => ['width' => '10'],
                            'contentOptions' => ['class' => 'text-center'],
                            'headerOptions' => ['class' => 'text-center'],
                        ],
                        [
                            'attribute' => 'person_education_professional',
                            'header' => 'ตำแหน่งเฉพาะด้าน',
                            'headerOptions' => ['width' => '60'],
                            'headerOptions' => ['class' => 'text-center'],
                            'contentOptions' => ['class' => 'text-center'],
                        ],
                        [
                            'attribute' => 'total',
                            'header' => 'จำนวน',
                            'headerOptions' => ['width' => '30'],
                            'headerOptions' => ['class' => 'text-center'],
                            'contentOptions' => ['class' => 'text-center'],
                        ],
                    ],
                    'clientOptions' => [
                        "lengthMenu" => [[20, -1], [20, Yii::t('app', "All")]], //20 Rows
                        "info" => TRUE,
                        "responsive" => true,
                        "dom" => 'lfTrtip',
                        "tableTools" => [
                            "aButtons" => [
                                [
                                    "sExtends" => "copy",
                                    "sButtonText" => Yii::t('app', "Copy to clipboard")
                                ], [
                                    "sExtends" => "csv",
                                    "sButtonText" => Yii::t('app', "Save to CSV")
                                ], [
                                    "sExtends" => "xls",
                                    "oSelectorOpts" => ["page" => 'current']
                                ], [
                                    "sExtends" => "pdf",
                                    "sButtonText" => Yii::t('app', "Save to PDF")
                                ], [
                                    "sExtends" => "print",
                                    "sButtonText" => Yii::t('app', "Print")
                                ],
                            ]
                        ]
                    ]
                ]);
                ?>
            </div>
        </div>

    </div>

