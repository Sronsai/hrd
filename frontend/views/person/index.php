<?php

use yii\helpers\Html;
//use yii\grid\GridView;
use yii\bootstrap\Nav;
use yii\helpers\ArrayHelper;
use yii\widgets\Pjax;
use kartik\grid\GridView;

//use frontend\models\Province;
//
//$this->title = 'People';
//$this->params['breadcrumbs'][] = $this->title;
?>

<!--link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css"-->
<div class="index">
    <nav class="navbar navbar-default navbar-custom navbar-fixed-top">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <!--a class="navbar-brand" href="?r=site/index">ระบบบุคลากร</a-->
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="?r=site/index">หน้าแรก</a>
                    </li>
                    <li>
                        <a href="?r=person/index">เพิ่มบุคลากรใหม่</a>
                    </li>
                    <li>
                        <a href="?r=training/index">ทะเบียนฝึกอบรม</a>
                    </li>
                    <!--li>
                        <a href="?r=leave/index">ทะเบียนการลา</a>
                    </li-->
                    <li>
                        <a href="?r=report/index">รายงาน</a>
                    </li>
                    <li>
                        <a href="?r=site/about">เกี่ยวกับเรา</a>
                    </li>
                    <li>
                        <a href="?r=site/contact">ติดต่อเรา</a>
                    </li>
                    <li>
                        <?=
                        Nav::widget(
                                [
                                    'encodeLabels' => false,
                                    'options' => ['class' => 'sidebar-menu'],
                                    'items' => [
                                        [
                                            'label' => '<center><i class="glyphicon glyphicon-lock"></i><br /><span> เข้าสู่ระบบ</span></center>',
                                            'url' => ['/site/login'],
                                            'visible' => Yii::$app->user->isGuest,
                                        ],
                                        [
                                            'label' => '<center><i class="glyphicon glyphicon-log-in"></i><br /><span> ออกจากระบบ</span></center>',
                                            'url' => ['/site/logout'],
                                            'visible' => !Yii::$app->user->isGuest,
                                            'linkOptions' => ['data-method' => 'post']
                                        ],
                                    ],
                                ]
                        );
                        ?><!--?php echo $username; ?-->
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <header class="intro-header" style="background-image: url('img/add-report.jpg')">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <div class="page-heading">
                        <h1><br /><br /></h1>
                        <!--hr class="small"-->
                        <span class="subheading1"><br /></span>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="container123">       

        <center><p><?= Html::a('<span class="glyphicon glyphicon-plus">&nbsp;</span>เพิ่มบุคลากร', ['create'], ['class' => 'btn btn-s btn-default default-ght btn-lg']) ?></p></center>


        <?=
        kartik\grid\GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            /* 'panel' => [
              'before' => ''
              ],
              'export' => [
              'showConfirmAlert' => true,
              'target' => GridView::TARGET_BLANK
              ], */
            'columns' => [
                [
                    'header' => 'ลำดับ',
                    'class' => 'yii\grid\SerialColumn',
                    'options' => ['width' => '5'],
                    'contentOptions' => ['class' => 'text-center'],
                    'headerOptions' => ['class' => 'text-center'],
                ],
                [
                    'options' => ['style' => 'width:150px;'],
                    'options' => ['width' => '80'],
                    'format' => 'raw',
                    'contentOptions' => ['class' => 'text-center'],
                    'headerOptions' => ['class' => 'text-center'],
                    'attribute' => 'person_photo',
                    'value' => function($model) {
                return Html::tag('div', '', [
                            'style' => 'width:100px;height:90px;
                          border-top: 10px solid rgba(255, 255, 255, .46);
                          background-image:url(' . $model->photoViewer . ');
                          background-size: cover;
                          background-position:center center;
                          background-repeat:no-repeat;
                          ']);
            }
                ],
                //'id',
                //'person_id',
                //'person_cid',
                //'person_pname',
                /* [
                  'attribute' => 'person_pname',
                  'filter' => frontend\models\Person::itemsAlias('person_pname'),
                  'value' => function($model) {
                  return $model->PName;
                  }
                  ], */
                /* [
                  'attribute' => 'person_id',
                  'options' => ['width' => '80'],
                  'contentOptions' => ['class' => 'text-center'],
                  'headerOptions' => ['class' => 'text-center'],
                  ], */
                [
                    //'header' => 'ประเภท',
                    'attribute' => 'person_type',
                    'filter' => frontend\models\Person::itemsAlias('person_type'),
                    'value' => function($model) {
                        return $model->Type;
                    },
                    'options' => ['width' => '120'],
                    'contentOptions' => ['class' => 'text-center'],
                    'headerOptions' => ['class' => 'text-center'],
                ],
                [
                    //'header' => 'ประจำแผนก',
                    'attribute' => 'person_department',
                    'filter' => frontend\models\Person::itemsAlias('person_department'),
                    'value' => function($model) {
                        return $model->Department;
                    },
                    'options' => ['width' => '150'],
                    'contentOptions' => ['class' => 'text-center'],
                    'headerOptions' => ['class' => 'text-center'],
                ],
                /* [
                  'attribute' => 'person_status',
                  'filter' => frontend\models\Person::itemsAlias('person_status'),
                  'value' => function($model) {
                  return $model->Status;
                  }
                  ], */
                /* [
                  //'header' => 'สถานะปัจจุบัน',
                  'attribute' => 'person_status_now',
                  'filter' => frontend\models\Person::itemsAlias('person_status_now'),
                  'value' => function($model) {
                  return $model->StatusNow;
                  },
                  'options' => ['width' => '100'],
                  'contentOptions' => ['class' => 'text-center'],
                  'headerOptions' => ['class' => 'text-center'],
                  ], */
                [
                    'attribute' => 'person_fullname',
                    'label' => 'ชื่อ-นามสกุล',
                    'format' => 'html',
                    'options' => ['width' => '180'],
                    'contentOptions' => ['class' => 'text-center'],
                    'headerOptions' => ['class' => 'text-center'],
                    'value' => function($model, $key, $index, $column) {
                return $model->pname . $model->person_fullname;
            }
                ],
                /* [
                  //'header' => 'เพศ',
                  'attribute' => 'person_sex',
                  'format' => 'html',
                  'filter' => frontend\models\Person::itemsAlias('sex'),
                  'value' => function($model) {
                  return $model->SexName;
                  },
                  'options' => ['width' => '60'],
                  'contentOptions' => ['class' => 'text-center'],
                  'headerOptions' => ['class' => 'text-center'],
                  ], */
                [
                    //'header' => 'ตำแหน่ง',
                    'attribute' => 'person_position',
                    'filter' => frontend\models\Person::itemsAlias('person_position'),
                    'value' => function($model) {
                        return $model->Position;
                    },
                    'options' => ['width' => '160'],
                    'contentOptions' => ['class' => 'text-center'],
                    'headerOptions' => ['class' => 'text-center'],
                ],
                [
                    'attribute' => 'birthday',
                    'format' => 'html',
                    //'filter' => frontend\models\Person::itemsAlias('age'),
                    'value' => function($model) {
                        return Yii::$app->thaiFormatter->asDate($model->person_birthday, 'medium');
                    },
                    'options' => ['width' => '100'],
                    'contentOptions' => ['class' => 'text-center'],
                    'headerOptions' => ['class' => 'text-center'],
                ],
                [
                    'attribute' => 'age',
                    'format' => 'html',
                    //'filter' => frontend\models\Person::itemsAlias('age'),
                    'value' => function($model) {
                        return $model->age;
                    },
                    'options' => ['width' => '60'],
                    'contentOptions' => ['class' => 'text-center'],
                    'headerOptions' => ['class' => 'text-center'],
                ],
                //            'age',
                //'person_birthday',
                //'person_age',
                //'person_sex',
                /* [
                  'attribute' => 'person_sex',
                  'filter' => frontend\models\Person::itemsAlias('sex'),
                  'value' => function($model) {
                  return $model->SexName;
                  }
                  ], */
                //'person_address:ntext',

                /* [
                  'attribute' => 'person_blod',
                  'filter' => frontend\models\Person::itemsAlias('person_blod'),
                  'value' => function($model) {
                  return $model->Blod;
                  }
                  ], */
                //'person_email:email',
                //'person_worked',
                //'person_workin',
                //'person_may',
                //'person_dad',
                //'person_mum',
                /* [
                  //'header' => 'ระดับ',
                  'attribute' => 'person_level',
                  'filter' => frontend\models\Person::itemsAlias('level'),
                  'value' => function($model) {
                  return $model->LevelName;
                  },
                  'options' => ['width' => '100'],
                  'contentOptions' => ['class' => 'text-center'],
                  'headerOptions' => ['class' => 'text-center'],
                  ], */
                //'person_license_number',  
                //'person_potition_number',
                /* [
                  'attribute' => 'person_education',
                  'filter' => frontend\models\Person::itemsAlias('person_education'),
                  'value' => function($model) {
                  return $model->Education;
                  }
                  ], */
                //'EducationName',
                /* [
                  'attribute' => 'person_phon',
                  'options' => ['width' => '100'],
                  'contentOptions' => ['class' => 'text-center'],
                  'headerOptions' => ['class' => 'text-center'],
                  ], */
                /* [
                  'attribute' => 'person_district',
                  'value' => 'districts.DISTRICT_NAME',
                  'options' => ['width' => '100'],
                  'contentOptions' => ['class' => 'text-center'],
                  'headerOptions' => ['class' => 'text-center'],
                  'filter' => Html::activeDropDownList($searchModel, 'person_district', ArrayHelper::map(Province::find()->asArray()->all(), 'DISTRICT_ID', 'DISTRICT_NAME'), [
                  'class' => 'form-control',
                  'prompt' => ''
                  ]),
                  ],
                  [
                  'attribute' => 'person_amphur',
                  'value' => 'amphurs.AMPHUR_NAME',
                  'options' => ['width' => '100'],
                  'contentOptions' => ['class' => 'text-center'],
                  'headerOptions' => ['class' => 'text-center'],
                  'filter' => Html::activeDropDownList($searchModel, 'person_amphur', ArrayHelper::map(Province::find()->asArray()->all(), 'AMPHUR_ID', 'AMPHUR_NAME'), [
                  'class' => 'form-control',
                  'prompt' => ''
                  ]),
                  ],
                  [
                  'attribute' => 'person_province',
                  'value' => 'provinces.PROVINCE_NAME',
                  'options' => ['width' => '100'],
                  'contentOptions' => ['class' => 'text-center'],
                  'headerOptions' => ['class' => 'text-center'],
                  'filter' => Html::activeDropDownList($searchModel, 'person_province', ArrayHelper::map(Province::find()->asArray()->all(), 'PROVINCE_ID', 'PROVINCE_NAME'), [
                  'class' => 'form-control',
                  'prompt' => ''
                  ]),
                  ],
                  [
                  'attribute' => 'person_salary',
                  'options' => ['width' => '100'],
                  'contentOptions' => ['class' => 'text-center'],
                  'headerOptions' => ['class' => 'text-center'],
                  ], */
                //'person_zipcode',
                //'person_salary',
                [
                    'class' => 'yii\grid\ActionColumn',
                    'header' => 'ปริ้น',
                    'options' => ['width' => '50'],
                    'headerOptions' => ['class' => 'text-center'],
                    'contentOptions' => ['class' => 'text-center'],
                    //'options' => ['style' => 'width:200px;'],
                    'template' => '<div class="btn-group btn-group-sm" role="group" aria-label="...">{pdf}</div>',
                    'buttons' => [
                        'pdf' => function($url, $model, $key) {
                            return Html::a('<i class="glyphicon glyphicon-print"></i>', $url, ['class' => 'btn btn-success btn-lg', 'title' => 'Print', 'target' => '_blank']);
                        },
                            /* 'delete' => function($url, $model, $key) {
                              return Html::a('<i class="glyphicon glyphicon-trash"></i>', $url, [
                              'title' => Yii::t('yii', 'Delete'),
                              'data-confirm' => Yii::t('yii', 'ยืนยันการลบข้อมูล'),
                              'data-method' => 'post',
                              'data-pjax' => '0',
                              'class' => 'btn btn-default'
                              ]);
                              } */
                            ]
                        ],
                        [
                            'class' => 'yii\grid\ActionColumn',
                            'header' => 'Full',
                            'options' => ['width' => '50'],
                            'headerOptions' => ['class' => 'text-center'],
                            'contentOptions' => ['class' => 'text-center'],
                            //'options' => ['style' => 'width:200px;'],
                            'template' => '<div class="btn-group btn-group-sm" role="group" aria-label="...">{pdffull}</div>',
                            'buttons' => [
                                'pdffull' => function($url, $model, $key) {
                                    return Html::a('<i class="glyphicon glyphicon-print"></i>', $url, ['class' => 'btn btn-warning btn-lg', 'title' => 'Print', 'target' => '_blank']);
                                },
                                    /* 'delete' => function($url, $model, $key) {
                                      return Html::a('<i class="glyphicon glyphicon-trash"></i>', $url, [
                                      'title' => Yii::t('yii', 'Delete'),
                                      'data-confirm' => Yii::t('yii', 'ยืนยันการลบข้อมูล'),
                                      'data-method' => 'post',
                                      'data-pjax' => '0',
                                      'class' => 'btn btn-default'
                                      ]);
                                      } */
                                    ]
                                ],
                                [
                                    'class' => 'yii\grid\ActionColumn',
                                    'header' => 'แก้ไข/ข้อมูล/ลบ',
                                    'options' => ['width' => '120'],
                                    'headerOptions' => ['class' => 'text-center'],
                                    'contentOptions' => ['class' => 'text-center'],
                                    //'options' => ['style' => 'width:200px;'],
                                    'template' => '<div class="btn-group btn-group-sm" role="group" aria-label="...">{update}{view} {delete}</div>',
                                    'buttons' => [
                                        'view' => function($url, $model, $key) {
                                            return Html::a('<i class="glyphicon glyphicon glyphicon-paste"></i>', $url, ['class' => 'btn btn-default btn-lg', 'title' => 'เปิดดู']);
                                            //return Html::a('<i class="glyphicon glyphicon-print"></i>', $url, ['class' => 'btn btn-default']);
                                        },
                                                'update' => function($url, $model, $key) {
                                            return Html::a('<i class="glyphicon glyphicon-pencil"></i>', $url, ['class' => 'btn btn-default btn-lg', 'title' => 'แก้ไข']);
                                        },
                                                'delete' => function($url, $model, $key) {
                                            return Html::a('<i class="glyphicon glyphicon-trash"></i>', $url, [
                                                        'class' => 'btn btn-danger btn-lg',
                                                        'title' => Yii::t('yii', 'Delete'),
                                                        'data-confirm' => Yii::t('yii', 'ยืนยันการลบข้อมูล'),
                                                        'data-method' => 'post',
                                                        'data-pjax' => '0',
                                                            //'class' => 'btn btn-default'
                                            ]);
                                        }
                                            ]
                                        ],
                                    ],
                                ]);
                                ?>

    </div>
</div>
