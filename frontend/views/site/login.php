<?php
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\bootstrap\Nav;

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

    <header class="intro-header" style="background-image: url('img/login.jpg')">
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

    <div class="container123">
        <center>
            <div class="row">
                <div class="col-lg-12">
                    <?php $form = ActiveForm::begin(['layout' => 'horizontal']); ?>

                    <?= $form->field($model, 'username') ?>

                    <?= $form->field($model, 'password')->passwordInput() ?>

                    <?= $form->field($model, 'rememberMe')->checkbox() ?>

                    <!--div style="color:#999;margin:1em 0">
                        If you forgot your password you can <?= Html::a('reset it', ['site/request-password-reset']) ?>
                </div-->


                    <div class="form-group">
                        <?= Html::submitButton('เข้าสู่ระบบ', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
                    </div>


                    <?php ActiveForm::end(); ?>
                </div>
            </div>
        </center>
    </div>
</div>

</div>
