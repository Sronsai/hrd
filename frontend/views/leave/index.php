<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\bootstrap\Nav;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\PersonSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'leave';
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

    <header class="intro-header" style="background-image: url('img/leave.jpg')">
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

        <center><p><?= Html::a('เพิ่มทะเบียนวันลา', ['create'], ['class' => 'btn btn-s btn-default default-ght btn-lg']) ?></p></center>

        <?=
        GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                [
                    'header' => 'ลำดับ',
                    'class' => 'yii\grid\SerialColumn',
                    'options' => ['width' => '20'],
                    'contentOptions' => ['class' => 'text-center'],
                    'headerOptions' => ['class' => 'text-center'],
                ],
                //'id',
                [
                    'attribute' => 'leave_year',
                    'filter' => frontend\models\Leave::itemsAlias('year'),
                    'value' => function($model) {
                        return $model->YearName;
                    },
                    'options' => ['width' => '60'],
                    'contentOptions' => ['class' => 'text-center'],
                    'headerOptions' => ['class' => 'text-center'],
                ],
                //'leave_year',
                [
                    'attribute' => 'person_id',
                    'filter' => frontend\models\Leave::itemsAlias('name'),
                    'value' => function($model) {
                        return $model->PersonName;
                    },
                    'options' => ['width' => '120'],
                    'contentOptions' => ['class' => 'text-center'],
                    'headerOptions' => ['class' => 'text-center'],
                ],
                //'person_id',
                [
                    'attribute' => 'leave_type',
                    'filter' => frontend\models\Leave::itemsAlias('type'),
                    'value' => function($model) {
                        return $model->TypeName;
                    },
                    'options' => ['width' => '90'],
                    'contentOptions' => ['class' => 'text-center'],
                    'headerOptions' => ['class' => 'text-center'],
                ],
                //'leave_type',
                [
                    'attribute' => 'leave_start',
                    'options' => ['width' => '100'],
                    'contentOptions' => ['class' => 'text-center'],
                    'headerOptions' => ['class' => 'text-center'],
                ],
                //'leave_start',
                [
                    'attribute' => 'leave_end',
                    'options' => ['width' => '100'],
                    'contentOptions' => ['class' => 'text-center'],
                    'headerOptions' => ['class' => 'text-center'],
                ],
                //'leave_end',
                [
                    'attribute' => 'leave_total',
                    'options' => ['width' => '80'],
                    'contentOptions' => ['class' => 'text-center'],
                    'headerOptions' => ['class' => 'text-center'],
                ],
                //'leave_total',
                [
                    'attribute' => 'leave_address',
                    'options' => ['width' => '300'],
                    'contentOptions' => ['class' => 'text-center'],
                    'headerOptions' => ['class' => 'text-center'],
                ],
                //'leave_address:ntext',
                [
                    'attribute' => 'leave_cause',
                    'options' => ['width' => '100'],
                    'contentOptions' => ['class' => 'text-center'],
                    'headerOptions' => ['class' => 'text-center'],
                ],
                //'leave_cause:ntext',
                [
                    'attribute' => 'leave_assign',
                    'options' => ['width' => '140'],
                    'contentOptions' => ['class' => 'text-center'],
                    'headerOptions' => ['class' => 'text-center'],
                ],
                //'leave_assign',
                [
                    'class' => 'yii\grid\ActionColumn',
                    'header' => 'แก้ไข / ดูข้อมูล',
                    'options' => ['width' => '120'],
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
                         /*       'delete' => function($url, $model, $key) {
                            return Html::a('<i class="glyphicon glyphicon-trash"></i>', $url, [
                                        'title' => Yii::t('yii', 'Delete'),
                                        'data-confirm' => Yii::t('yii', 'ยืนยันการลบข้อมูล'),
                                        'data-method' => 'post',
                                        'data-pjax' => '0',
                                        'class' => 'btn btn-default'
                            ]);
                        }*/
                            ]
                        ],
                    ],
                ]);
                ?>

    </div>
</div>
