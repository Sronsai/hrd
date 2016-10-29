<?php
/* @var $this yii\web\View */

//Yii::$app->request->get('id');
//print_r($id);
use dosamigos\gallery\Gallery;
use yii\helpers\Html;
use dixonsatit\thaiYearFormatter\ThaiYearFormatter;

//var_dump($model->getAge());
$time = time();
?>

<div class="risk-pdf">
    <div class="container"> 
        <table> 
            <tr>
                <td>
<?= Html::img(Yii::getAlias('@frontend') . '/images/logo_MOPH.png', ['width' => 120]) ?>
                    <!--img src="../images/logo_MOPH.png" alt="Smiley face" height="120" width="120"-->
                </td>
                <td> 
                    <strong><h3>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            โรงพยาบาลเชียงคาน</h3></strong> <br/>
                    <strong><i>&nbsp;427 หมู่ 2 ต.เชียงคาน อ.เชียงคาน จ.เลย 42110 โทรศัพท์ 042822181-182</i></strong><br /> 
                    <small>&nbsp; Email : Fateam50@gmail.com Web Site : hppt://www.ck-hospital.com</small><HR>
                    <!--small>&nbsp;Email : Fateam50@gmail.com Web Site : hppt://www.ck-hospital.com</small-->
                </td>
            </tr>
        </table>

        <div class="panel-body"> 
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<?= Html::img($model->photoViewer, ['class' => 'img-thumbnail', 'style' => 'width:120px;']); ?>
            <p><br/><br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;
                รหัสบุคลากร : <?= $model->person_id; ?></p> 
        </div>

        <h4><B>ข้อมูลส่วนบุคคล</B></h4> 
        <table class="table_bordered" width="100%" border="0" cellpadding="2" cellspacing="0">
            <tbody>
                <tr> 
                    <td>ชื่อ-สกุล : <!--?= $model->pname; ?--> <?= $model->person_fullname; ?></td> 
                    <td>เพศ : <?= $model->sexName; ?></td> 
                    <td>วันเกิด : <?= Yii::$app->thaiFormatter->asDate($model->person_birthday, 'medium'); ?></td> 
                </tr>
                <tr> 
                    <td>อายุ : <?= $model->age; ?> ปี</td>
                    <td>เลขบัตรประชาชน : <?= $model->person_cid; ?></td> 
                    <td>สถานะ : <?= $model->status; ?></td> 
                </tr>
                <tr> 
                    <td>กรุ๊บเลือด : <?= $model->blod; ?></td>       
                    <td>ที่อยู่ : <?= $model->person_address; ?></td> 
                    <td>ตำบล : <?= $model->districts->DISTRICT_NAME; ?></td> 

                </tr> 
                <tr> 
                    <td>อำเภอ : <?= $model->amphurs->AMPHUR_NAME; ?></td> 
                    <td>จังหวัด : <?= $model->provinces->PROVINCE_NAME; ?></td> 
                    <td>รหัสไปรษณีย์ : <?= $model->person_zipcode; ?></td> 

                </tr> 
                <tr> 
                    <td>โทรศัพท์ : <?= $model->person_phon; ?></td>   
                    <td><?= $model->person_email; ?></td> 
                </tr> 
            </tbody>
        </table><HR><br />


        <h4><B>ประวัติการศึกษา</B></h4> 
        <table class="table_bordered" width="100%" border="0" cellpadding="2" cellspacing="0">
            <tbody>
                <tr> 
                    <td>สาขาวิชาที่สำเร็จการศึกษา : <?= $model->person_education_title; ?></td> 
                    <td>วันที่สำเร็จการศึกษา : <?= Yii::$app->thaiFormatter->asDate($model->person_graduate, 'medium'); ?></td> 
                </tr>
                <tr> 
                    <td>จากสถาบัน/สภา/มหาวิทยาลัย : <!--?= $model->schools->school_name; ?--></td> 
                    <td>ระดับ : <?= $model->person_education; ?></td> 
                </tr>
            </tbody>
        </table><HR><br />


        <h4><B>ประวัติรับราชการ</B></h4> 
        <table class="table_bordered" width="100%" border="0" cellpadding="2" cellspacing="0">
            <tbody>
                <tr> 
                    <td>ประเภท : <?= $model->Type; ?></td> 
                    <td>วันที่บรรจุ : <?= Yii::$app->thaiFormatter->asDate($model->person_worked, 'medium'); ?></td> 
                    <td>วันที่เข้าทำงาน : <?= Yii::$app->thaiFormatter->asDate($model->person_workin, 'medium'); ?></td> 
                </tr>
                <tr> 
                    <td>ตำแหน่ง : <?= $model->Position; ?></td>
                    <td>ระดับ : <?= $model->LevelName; ?></td> 
                    <td>สถานะปัจจุบัน : <?= $model->StatusNow; ?></td> 
                </tr>
                <tr> 
                    <td>เลขที่ตำแหน่ง : <?= $model->person_potition_number; ?></td>
                    <td>เลขที่ใบประกอบ : <?= $model->person_license_number; ?></td> 
                    <td>ประจำแผนก : <?= $model->Department; ?></td> 
                </tr>
                <tr> 
                    <td>ประกันสังคม : <?= $model->person_insurance; ?></td>
                    <td>พตส. : <?= $model->person_pts; ?></td> 
                    <td>ฉ.4/6/8/9 : <?= $model->person_cho; ?></td> 
                </tr>
                <tr> 
                    <td>อัตราเงินเดือน : <?= $model->person_salary; ?></td>
                    <td>เงินเดือน. : <?= $model->PayName; ?></td>  
                </tr>
            </tbody>
        </table><HR>




        <!--h3>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>ข้อมูลบุคลากร รพ.เชียงคาน</b></h3-->
        <br /><br /><br /><br /><br />

        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

        (.....................................................)<br />
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <strong><i>พญ.ระพีพรรณ จันทร์อ้วน</i></strong>
        <br />
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <strong><i>ผู้อำนวยการโรงพยาบาลเชียงคาน</i></strong>
        <br /><br />
        <center>
            <p>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                ออกเมื่อวันที่ : <!--?= Yii::$app->thaiFormatter->asDate($time, 'medium'); ?-->
<?= Yii::$app->thaiFormatter->asDate($time, 'medium'); ?>
            </p> 
        </center>
    </div>
</div>