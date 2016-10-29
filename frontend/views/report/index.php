<?php
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\ContactForm */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\web\UrlManager;
use kartik\grid\GridView;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use yii\bootstrap\Button;
use kartik\tabs\TabsX;
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

    <div class="container">
        <div class="col-lg-6">
            <!-- Page Header -->
            <!-- Set your background image for this header on the line below. -->
            <header class="intro-header" style="background-image: url('img/Rrreport.png')">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                            <div class="page-heading">
                                <h2><br /></h2>
                                <!--hr class="small"-->
                                <span class="subheading1"><br /></span>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
        </div>

        <br /><br /><br /><br /><br />


        <div class="col-lg-6">
            <div class="panel panel-default">
                <div class="panel-body">
                    <center><h3>รายงานทะเบียนบุคลากร รพ.เชียงคาน</h3></center>
                    <a href="?r=/report/report1" target="_blank"> 1. รายงานบุคลากร รพ.เชียงคาน แยกแผนก </a><br />
                    <a href="?r=/report/report2" target="_blank"> 2. รายงานบุคลากร รพ.เชียงคาน แยกประเภท </a><br />
                    <a href="?r=/report/report3" target="_blank"> 3. รายงานบุคลากร รพ.เชียงคาน ระดับการศึกษา+จำนวน </a><br />
                    <a href="?r=/report/report4" target="_blank"> 4. รายงานบุคลากร รพ.เชียงคาน ตำแหน่งเฉพาะทาง+จำนวน </a><br />
                </div>
            </div>
        </div>
        <HR>
        <div class="col-lg-6">
            <div class="panel panel-default">
                <div class="panel-body">
                    <center><h3>รายงานทะเบียนอบรม รพ.เชียงคาน</h3></center>
                    1.  <br />
                    2. 
                </div>
            </div>
        </div>



    </div>
</div>
