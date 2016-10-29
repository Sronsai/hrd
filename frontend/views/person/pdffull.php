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
                    <td>คำนำหน้าชื่อ : <?=
                        $model->PName
                        ?>
                    </td> 
                </tr><br /><br />    
            <tr> 
                <td>สกุล : <?=
                    $model->person_fullname
                    ?>
                </td> 
            </tr><br /><br />  
            <tr> 
                <td>ชื่อเล่น : <?=
                    $model->person_nickname
                    ?>
                </td> 
            </tr><br /><br />  
            <tr> 
                <td>เพศ : <?=
                    $model->sexName
                    ?>
                </td> 
            </tr><br /><br />  
            <tr> 
                <td>
                    วันเกิด : <?=
                    Yii::$app->thaiFormatter->asDate($model->person_birthday, 'medium')
                    ?>
                </td> 
            </tr><br /><br />
            <tr> 
                <td>อายุ : 
                    <?=
                    $model->age
                    ?>
                </td>    
            </tr><br /><br />
            <tr> 
                <td>เลขบัตรประชาชน : 
                    <?=
                    $model->person_cid
                    ?>
                </td>    
            </tr><br /><br />
            <tr> 
                <td>สถานะ : 
                    <?=
                    $model->status
                    ?>
                </td>    
            </tr><br /><br />
            <tr> 
                <td>ชื่อบิดา : 
                    <?=
                    $model->person_dad
                    ?>
                </td>    
            </tr><br /><br />
            <tr> 
                <td>ชื่อมารดา : 
                    <?=
                    $model->person_mum
                    ?>
                </td>    
            </tr><br /><br />
            <tr> 
                <td>ชื่อคู่สมรส : 
                    <?=
                    $model->person_may
                    ?>
                </td>    
            </tr><br /><br />
            <tr> 
                <td>กรุ๊บเลือด : 
                    <?=
                    $model->blod
                    . "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ที่อยู่เลขที่ : " .
                    $model->person_address
                    ?>
                </td>    
            </tr><br /><br />
            <tr>
                <td>ที่อยู่ปัจจุบัน : <?= "ตำบล" . $model->districts->DISTRICT_NAME . "อำเภอ" . $model->amphurs->AMPHUR_NAME . "จังหวัด" . $model->provinces->PROVINCE_NAME . "รหัสไปรษณีย์ : " . $model->person_zipcode ?></td>                 
            </tr> <br /><br />
            <tr>   
                <td>โทรศัพท์ : <?=
                    $model->person_phon
                    . "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;E-mail : " .
                    $model->person_email
                    ?></td>   
            </tr> <br /><br />
            <tr>
                <td>ที่อยู่ตามภูมิลำเนาเดิม : <?= "ตำบล" . $model->districtOlds->DISTRICT_NAME . "อำเภอ" . $model->amphurOlds->AMPHUR_NAME . "จังหวัด" . $model->provinceOlds->PROVINCE_NAME ?></td>                 
            </tr> 
            </tbody>
        </table><HR><br />


        <h4><B>ประวัติการศึกษา</B></h4> 
        <table class="table_bordered" width="100%" border="0" cellpadding="2" cellspacing="0">
            <tbody>
                <tr> 
                    <td>สาขาวิชาที่สำเร็จการศึกษา : 
                        <?=
                        $model->person_education_title
                        ?>
                    </td>    
                </tr><br /><br />
            <tr> 
                <td>วันที่สำเร็จการศึกษา : 
                    <?=
                    Yii::$app->thaiFormatter->asDate($model->person_graduate, 'medium')
                    ?>
                </td>    
            </tr><br /><br />
            <tr> 
                <td>จากสถาบัน/สภา/มหาวิทยาลัย : 
                    <?=
                    $model->schools->school_name
                    ?>
                </td>    
            </tr><br /><br />
            <tr> 
                <td>ระดับ : 
                    <?=
                    $model->person_education
                    ?>
                </td>    
            </tr><br /><br />
            <tr> 
                <td>เชี่ยวชาญเฉพาะด้าน : <?= $model->person_education_professional; ?></td> 
            </tr><br /><br />
            </tbody>
        </table><HR><br />


        <h4><B>ประวัติรับราชการ</B></h4> 
        <table class="table_bordered" width="100%" border="0" cellpadding="2" cellspacing="0">
            <tbody>
                <tr> 
                    <td>ประเภท : 
                        <?=
                        $model->Type
                        ?>
                    </td>    
                </tr><br /><br />
            <tr> 
                <td>วันที่บรรจุ : 
                    <?=
                    Yii::$app->thaiFormatter->asDate($model->person_worked, 'medium')
                    ?>
                </td>    
            </tr><br /><br />
            <tr> 
                <td>วันที่เข้าทำงาน : 
                    <?=
                    Yii::$app->thaiFormatter->asDate($model->person_workin, 'medium')
                    ?>
                </td>    
            </tr><br /><br />
            <tr> 
                <td>ตำแหน่ง : 
                    <?=
                    $model->Position
                    ?>
                </td>    
            </tr><br /><br />
            <tr> 
                <td>ระดับ : 
                    <?=
                    $model->LevelName
                    ?>
                </td>    
            </tr><br /><br />
            <tr> 
                <td>สถานะปัจจุบัน : 
                    <?=
                    $model->StatusNow
                    ?>
                </td>    
            </tr><br /><br />
            <tr> 
                <td>วันที่ออกใบอนุญาต : 
                    <?=
                    $model->person_license_start
                    ?>
                </td>    
            </tr><br /><br />
            <tr> 
                <td>วันหมดอายุใบอนุญาต : 
                    <?=
                    $model->person_license_exp
                    ?>
                </td>    
            </tr><br /><br />
            <tr> 
                <td>เลขที่ตำแหน่ง : 
                    <?=
                    $model->person_potition_number
                    ?>
                </td>    
            </tr><br /><br />
            <tr> 
                <td>เลขที่ใบประกอบ : 
                    <?=
                    $model->person_license_number
                    ?>
                </td>    
            </tr><br /><br />
            <tr> 
                <td>ประจำแผนก : 
                    <?=
                    $model->Department
                    ?>
                </td>    
            </tr><br /><br />
            <tr> 
                <td>ประกันสังคม : 
                    <?=
                    $model->person_insurance
                    ?>
                </td>    
            </tr><br /><br />
            <tr> 
                <td>พตส. : 
                    <?=
                    $model->person_pts
                    ?>
                </td>    
            </tr><br /><br />
            <tr> 
                <td>ฉ.4/6/8/9 : 
                    <?=
                    $model->person_cho
                    ?>
                </td>    
            </tr><br /><br />
            <tr> 
                <td>อัตราเงินเดือน : 
                    <?=
                    $model->person_salary
                    ?>
                </td>    
            </tr><br /><br />
            <tr> 
                <td>เงินเดือน. : 
                    <?=
                    $model->PayName
                    ?>
                </td>    
            </tr><br /><br />
            </tbody>
        </table><HR>




        <!--h3>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>ข้อมูลบุคลากร รพ.เชียงคาน</b></h3-->
        <br />

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