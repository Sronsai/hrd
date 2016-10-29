<?php
/* @var $this yii\web\View */

use fedemotta\datatables\DataTables;
use kartik\grid\GridView;
use yii\helpers\ArrayHelper;
use kartik\export\ExportMenu;

$this->title = 'รายงานบุคลากร รพ.เชียงคาน แยกแผนก';

//use yii\helpers\Url;

$this->params['breadcrumbs'][] = ['label' => 'รายงาน', 'url' => ['/report/index']];
$this->params['breadcrumbs'][] = 'รายงานบุคลากร รพ.เชียงคาน แยกแผนก';
?>

<div class="report">
    <center><h1><u>รายงานบุคลากร รพ.เชียงคาน แยกแผนก</u></h1></center>

    <div class="row">
        <div class='well'>
        <!--h4><i class="icon fa fa-bar-chart"></i> รายการความเสี่ยงทั้งหมด</h4-->
            <form method="POST"> 

                <!--div id="div5">เลือกแผนก :</div-->
                <div class="col-lg-2">
                    <?php
                    $list = yii\helpers\ArrayHelper::map(frontend\models\LookupDepartment::find()->all(), 'id', 'department_name');
                    echo yii\helpers\Html::dropDownList('department_name', $department, $list, [
                        'prompt' => 'เลือกแผนก',
                        'class' => 'form-control',
                    ]);
                    ?>
                </div>&nbsp;

                <button class='btn btn-success'>&nbsp;&nbsp;ประมวลผล&nbsp;&nbsp;</button>


            </form>
        </div>



        <div class="panel panel-default">
            <div class="panel-body">
                <?php
                if (isset($dataProvider))
                    $dev = \yii\helpers\Html::a('คุณดนัย สอนไสย', 'https://fb.com/foyplvowlp', ['target' => '_blank']);


//echo yii\grid\GridView::widget([
                //echo kartik\grid\GridView::widget([
                echo DataTables::widget([
                    'dataProvider' => $dataProvider,
                    'columns' => [
                        [
                            'attribute' => 'person_id',
                            'header' => 'รหัสบุคลากร',
                            'headerOptions' => ['width' => '50'],
                            'headerOptions' => ['class' => 'text-center'],
                            'contentOptions' => ['class' => 'text-center'],
                        ],
                        [
                            'attribute' => 'person_cid',
                            'header' => 'CID',
                            'headerOptions' => ['width' => '30'],
                            'headerOptions' => ['class' => 'text-center'],
                            'contentOptions' => ['class' => 'text-center'],
                        ],
                        [
                            'attribute' => 'person_pname',
                            'header' => 'นำหน้า',
                            'headerOptions' => ['width' => '20'],
                            'headerOptions' => ['class' => 'text-center'],
                            'contentOptions' => ['class' => 'text-center'],
                        ],
                        [
                            'attribute' => 'person_fullname',
                            'header' => 'ชื่อ-นามสกุล',
                            'headerOptions' => ['width' => '100'],
                            'headerOptions' => ['class' => 'text-center'],
                            'contentOptions' => ['class' => 'text-center'],
                        ],
                        [
                            'attribute' => 'person_birthday',
                            'header' => 'วันเกิด',
                            'headerOptions' => ['width' => '100'],
                            'headerOptions' => ['class' => 'text-center'],
                            'contentOptions' => ['class' => 'text-center'],
                        ],
                        [
                            'attribute' => 'person_age',
                            'header' => 'อายุ',
                            'headerOptions' => ['width' => '100'],
                            'headerOptions' => ['class' => 'text-center'],
                            'contentOptions' => ['class' => 'text-center'],
                        ],
                        /* [
                          'attribute' => 'location_name',
                          'header' => 'หน่วยงานที่เกิดเหตุ',
                          'headerOptions' => ['width' => '100']
                          ],
                          [
                          'attribute' => 'connection',
                          'header' => 'หน่วยงานที่เกี่ยวข้อง',
                          'headerOptions' => ['width' => '130']
                          ], */
                        [
                            'attribute' => 'type_name',
                            'header' => 'ประเภท',
                            'headerOptions' => ['width' => '100'],
                            'headerOptions' => ['class' => 'text-center'],
                            'contentOptions' => ['class' => 'text-center'],
                        ],
                        [
                            'attribute' => 'position_name',
                            'header' => 'ตำแหน่ง',
                            'headerOptions' => ['width' => '100'],
                            'headerOptions' => ['class' => 'text-center'],
                            'contentOptions' => ['class' => 'text-center'],
                        ],
                        [
                            'attribute' => 'department_name',
                            'header' => 'ประจำแผนก',
                            'headerOptions' => ['width' => '130'],
                            'headerOptions' => ['class' => 'text-center'],
                            'contentOptions' => ['class' => 'text-center'],
                        ],
                        /* [
                          'attribute' => 'person_workin',
                          'header' => 'วันที่เข้าทำงาน',
                          'headerOptions' => ['width' => '130'],
                          'headerOptions' => ['class' => 'text-center'],
                          'contentOptions' => ['class' => 'text-center'],
                          ], */
                        [
                            'attribute' => 'person_worked',
                            'header' => 'วันที่บรรจุ',
                            'headerOptions' => ['width' => '130'],
                            'headerOptions' => ['class' => 'text-center'],
                            'contentOptions' => ['class' => 'text-center'],
                        ],
                        [
                            'attribute' => 'person_phon',
                            'header' => 'โทรศัพท์',
                            'headerOptions' => ['width' => '130'],
                            'headerOptions' => ['class' => 'text-center'],
                            'contentOptions' => ['class' => 'text-center'],
                        ],
                    ],
                    'clientOptions' => [
                        "lengthMenu" => [[15, -1], [15, Yii::t('app', "All")]], //20 Rows
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

