<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\bootstrap\Nav;

//use frontend\models\Person;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\TrainingSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Trainings';
//$this->params['breadcrumbs'][] = $this->title;
?>
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


    <!-- Page Header -->
    <!-- Set your background image for this header on the line below. -->
    <header class="intro-header" style="background-image: url('img/training.jpg')">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <div class="page-heading">
                        <h2><br /></h2>
                        <!--hr class="small"-->
                        <span class="subheading1"></span>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!--h1><?= Html::encode($this->title) ?></h1-->

    <?php // echo $this->render('_search', ['model' => $searchModel]);   ?>

    <center><p><?= Html::a('<span class="glyphicon glyphicon-plus">&nbsp;</span>เพิ่มทะเบียนฝึกอบรม', ['create'], ['class' => 'btn btn-s btn-default default-ght btn-lg']) ?></p></center>

    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            [
                'header' => 'ลำดับ',
                'class' => 'yii\grid\SerialColumn',
                'options' => ['width' => '10'],
                'contentOptions' => ['class' => 'text-center'],
                'headerOptions' => ['class' => 'text-center'],
            ],
            //'id',
            [
                'header' => 'ปีงบ',
                'attribute' => 'training_year',
                'filter' => frontend\models\Training::itemsAlias('training_year'),
                'value' => function($model) {
                    return $model->YearName;
                },
                'options' => ['width' => '50'],
                'contentOptions' => ['class' => 'text-center'],
                'headerOptions' => ['class' => 'text-center'],
            ],
            //'training_year',
            [
                'header' => 'ผู้ขออบรม',
                'attribute' => 'person',
                'value' => 'person.person_fullname',
                //'filter' => frontend\models\Person::itemsAlias('person_fullname'),
                /* 'value' => function($model) {
                  return $model->PersonName;
                  }, */
                'options' => ['width' => '140'],
                'contentOptions' => ['class' => 'text-center'], 
                'headerOptions' => ['class' => 'text-center'],
            ],
            //'person_id',
            /* [
              'attribute' => 'training_start',
              'options' => ['width' => '150'],
              'contentOptions' => ['class' => 'text-center'],
              'headerOptions' => ['class' => 'text-center'],
              ],
              [
              'attribute' => 'training_end',
              'options' => ['width' => '150'],
              'contentOptions' => ['class' => 'text-center'],
              'headerOptions' => ['class' => 'text-center'],
              ], */
            /* [
              'attribute' => 'training_book_number',
              'options' => ['width' => '100'],
              'contentOptions' => ['class' => 'text-center'],
              'headerOptions' => ['class' => 'text-center'],
              ], */
            [
                'header' => 'ภายใน/ภายนอก',
                'attribute' => 'training_type',
                'filter' => frontend\models\Training::itemsAlias('type'),
                'value' => function($model) {
                    return $model->TypeName;
                },
                'options' => ['width' => '100'],
                'contentOptions' => ['class' => 'text-center'],
                'headerOptions' => ['class' => 'text-center'],
            ],
            [
                'header' => 'หน่วยงานที่จัด',
                'attribute' => 'training_department',
                'filter' => frontend\models\Training::itemsAlias('training_department'),
                'value' => function($model) {
                    return $model->TrainingName;
                },
                'options' => ['width' => '120'],
                'contentOptions' => ['class' => 'text-center'],
                'headerOptions' => ['class' => 'text-center'],
            ],
            //'training_type',
            /* [
              'attribute' => 'training_unit',
              'options' => ['width' => '100'],
              'contentOptions' => ['class' => 'text-center'],
              'headerOptions' => ['class' => 'text-center'],
              ], */
            /* [
              'attribute' => 'training_total',
              'options' => ['width' => '100'],
              'contentOptions' => ['class' => 'text-center'],
              'headerOptions' => ['class' => 'text-center'],
              ], */
            [
                'header' => 'หลักสูตร',
                'attribute' => 'training_course',
                'options' => ['width' => '150'],
                //'contentOptions' => ['class' => 'text-center'],
                'headerOptions' => ['class' => 'text-center'],
            ],
            /* [
              'header' => 'สถานที่',
              'attribute' => 'training_location',
              'options' => ['width' => '100'],
              'contentOptions' => ['class' => 'text-center'],
              'headerOptions' => ['class' => 'text-center'],
              ], */
            [
                'header' => 'งบประมาณ',
                'attribute' => 'training_budget',
                'options' => ['width' => '100'],
                'contentOptions' => ['class' => 'text-center'],
                'headerOptions' => ['class' => 'text-center'],
            ],
            [
                'header' => 'สิ่งที่จะดำเนินการหลังจากอบรม',
                'attribute' => 'training_expectations',
                'options' => ['width' => '200'],
                //'contentOptions' => ['class' => 'text-center'],
                'headerOptions' => ['class' => 'text-center'],
            ],
            [
                'header' => 'ผู้เข้าร่วมอบรม',
                'attribute' => 'fullNames',
                /*'filter' => frontend\models\Training::itemsAlias('training_department'),
                'value' => function($model) {
                    return $model->TrainingName;
                },*/
                'options' => ['width' => '200'],
                //'contentOptions' => ['class' => 'text-center'],
                'headerOptions' => ['class' => 'text-center'],
            ],
            [
                'header' => 'ดำเนินการ',
                'attribute' => 'training_actions',
                'format' => 'html',
                'options' => ['width' => '100'],
                'contentOptions' => ['class' => 'text-center'],
                'headerOptions' => ['class' => 'text-center'],
                'filter' => frontend\models\Training::itemsAlias('actions'),
                'value' => function($model, $key, $index, $column) {
            return $model->training_actions == 2 ? "<span style=\"color:green;\"><i class=\"glyphicon glyphicon-ok\"></i></span>" : "<span style=\"color:red;\"><i class=\"glyphicon glyphicon-remove\"></i></span>";
            //return $model->training_actions == 2 ? "<span style=\"color:green;\">YES</span>":"<span style=\"color:red;\">NO</span>";
        }
            ],
            [
                'class' => 'yii\grid\ActionColumn',
                'header' => 'แก้ไข / ดูข้อมูล',
                'options' => ['width' => '100'],
                'headerOptions' => ['class' => 'text-center'],
                'contentOptions' => ['class' => 'text-center'],
                //'options' => ['style' => 'width:200px;'],
                'template' => '<div class="btn-group btn-group-sm" role="group" aria-label="...">{update}{view}</div>',
                'buttons' => [
                    'view' => function($url, $model, $key) {
                        return Html::a('<i class="glyphicon glyphicon glyphicon-paste"></i>', $url, ['class' => 'btn btn-default']);
                        //return Html::a('<i class="glyphicon glyphicon-print"></i>', $url, ['class' => 'btn btn-default']);
                    },
                            'update' => function($url, $model, $key) {
                        return Html::a('<i class="glyphicon glyphicon-pencil"></i>', $url, ['class' => 'btn btn-default']);
                    },
                        /*        'delete' => function($url, $model, $key) {
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
                ],
            ]);
            ?>

</div>
