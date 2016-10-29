<?php

use yii\helpers\Html;
use yii\helpers\Url;
//use yii\widgets\ActiveForm;
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;
use dosamigos\datepicker\DatePicker;
use kartik\widgets\DepDrop;
use frontend\models\Province;
use frontend\models\District;
use frontend\models\Amphur;
use frontend\models\ProvinceOld;
use frontend\models\DistrictOld;
use frontend\models\AmphurOld;
use kartik\checkbox\CheckboxX;
use kartik\widgets\Select2;
use yii\web\JsExpression;

//use kartik\widgets\ActiveForm;
//use kartik\widgets\DatePicker;
//use yii\jui\DatePicker;

/* @var $this yii\web\View */
/* @var $model frontend\models\Person */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="container">
    <div class="index-form">

        <?php
        $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]);
        ?>

        <div class="panel panel-primary">
            <div class="panel-heading"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> ข้อมูลส่วนบุคคล</div>
            <div class="panel-body">
                <center>
                    <div class="row">
                        <div class="col-md-3"></div>
                        <div class="col-md-3">
                            <div class="well text-center">
                                <center><?= Html::img($model->getPhotoViewer(), ['style' => 'width:200px;', 'class' => 'img-rounded']); ?></center>
                            </div>
                        </div>
                        <br /><br /><br />
                        <div class="col-md-3">

                            <?= $form->field($model, 'person_photo')->fileInput() ?>
                        </div>
                    </div>
                </center>

                <div class="row">
                    <div class="col-md-2">
                        <?= $form->field($model, 'person_id')->textInput(['maxlength' => true]) ?>
                    </div>
                    <div class="col-md-2">
                        <!--?= $form->field($model, 'person_cid')->textInput(['maxlength' => true]) ?-->
                        <?=
                        $form->field($model, 'person_cid')->widget(\yii\widgets\MaskedInput::classname(), [
                            'mask' => '9-9999-99999-99-9',
                        ])
                        ?>
                    </div>   
                    <div class="col-md-2">
                        <?= $form->field($model, 'person_sex')->inline()->radioList($model->getItemPersonSex()) ?>
                        <!--?= $form->field($model, 'person_sex')->textInput(['maxlength' => true]) ?-->
                    </div>
                    <div class="col-md-2">
                        <?= $form->field($model, 'person_pname')->dropdownList($model->getItemPersonPname(), ['prompt' => 'เลือกสรรพนาม..']) ?>
                        <!--?= $form->field($model, 'person_pname')->textInput(['maxlength' => true]) ?-->
                    </div>
                    <div class="col-md-2">
                        <?= $form->field($model, 'person_fullname')->textInput(['maxlength' => true]) ?>
                    </div>
                    <!--div class="col-md-2">
                    <!--?= $form->field($model, 'person_oname')->textInput(['maxlength' => true]) ?>
                </div-->
                    <div class="col-md-2">
                        <?= $form->field($model, 'person_nickname')->textInput(['maxlength' => true]) ?>
                    </div>
                </div>

                <div class="row">                             
                    <!--div class="col-md-2">
                    <!--?= $form->field($model, 'person_age')->textInput(['maxlength' => true]) ?>
                </div-->
                    <div class="col-md-2">

                        <?=
                        $form->field($model, 'person_birthday')->widget(
                                DatePicker::className(), [
                            'options' => ['placeholder' => 'เลือกวันที่'],
                            //'inline' => true,
                            'inline' => false,
                            //'template' => '<div class="well well-sm" style="background-color: #fff; width:250px">{input}</div>',
                            'language' => 'th',
                            'clientOptions' => [
                                'autoclose' => true,
                                'format' => 'yyyy-mm-d',
                                'class' => 'form-control',
                            ]
                        ]);
                        ?>
                        <!--?= $form->field($model, 'person_birthday')->textInput(['maxlength' => true]) ?-->
                    </div>
                    <div class="col-md-2">
                        <!--?= $form->field($model, 'person_blod')->textInput(['maxlength' => true]) ?-->
                        <?= $form->field($model, 'person_blod')->dropdownList($model->getItemPersonBlod(), ['prompt' => 'เลือกหมู่เลือด..']) ?>
                    </div>
                    <div class="col-md-2">
                        <?= $form->field($model, 'person_status')->dropdownList($model->getItemPersonStatus(), ['prompt' => 'เลือกสถานะ..']) ?>
                        <!--?= $form->field($model, 'person_status')->inline()->radioList($model->getItemPersonStatus()) ?-->
                    </div>
                    <div class="col-md-2">
                        <?= $form->field($model, 'person_may')->textInput(['maxlength' => true]) ?>
                    </div>
                    <div class="col-md-2">
                        <?= $form->field($model, 'person_dad')->textInput(['maxlength' => true]) ?>
                    </div>
                    <div class="col-md-2">
                        <?= $form->field($model, 'person_mum')->textInput(['maxlength' => true]) ?>
                    </div>
                </div>


                <?= $form->field($model, 'person_address')->textarea(['rows' => 2]) ?>


                <div class="row">
                    <div class="col-md-2">
                        <?=
                        $form->field($model, 'person_province')->dropdownList(
                                ArrayHelper::map(Province::find()->all(), 'PROVINCE_ID', 'PROVINCE_NAME'), [
                            'id' => 'ddl-province',
                            'prompt' => 'เลือกจังหวัด'
                        ]);
                        ?>
                    </div>
                    <div class="col-md-2">
                        <?=
                        $form->field($model, 'person_amphur')->widget(DepDrop::classname(), [
                            'options' => ['id' => 'ddl-amphur'],
                            'data' => $amphur, //<---------
                            'pluginOptions' => [
                                'depends' => ['ddl-province'],
                                'placeholder' => 'เลือกอำเภอ...',
                                'url' => Url::to(['/person/get-amphur'])
                            ]
                        ]);
                        ?>
                    </div>
                    <div class="col-md-2">
                        <?=
                        $form->field($model, 'person_district')->widget(DepDrop::classname(), [
                            'data' => $district, //<---------
                            'pluginOptions' => [
                                'depends' => ['ddl-province', 'ddl-amphur'],
                                'placeholder' => 'เลือกตำบล...',
                                'url' => Url::to(['/person/get-district'])
                            ]
                        ]);
                        ?>
                    </div>      
                    <div class="col-md-2">
                        <?=
                        $form->field($model, 'person_zipcode')->widget(\yii\widgets\MaskedInput::classname(), [
                            'mask' => '99999',
                        ])
                        ?>
                    </div>
                    <div class="col-md-2">
                        <?=
                        $form->field($model, 'person_phon')->widget(\yii\widgets\MaskedInput::classname(), [
                            'mask' => '999-9999999',
                        ])
                        ?>
                    </div>
                    <div class="col-md-2">
                        <?= $form->field($model, 'person_email')->textInput(['maxlength' => true]) ?>
                    </div>
                </div>   


                <div class="row">
                    <div class="col-md-12">
                        <?= $form->field($model, 'person_address_old')->textarea(['rows' => 2]) ?>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <?=
                        $form->field($model, 'person_province_old')->dropdownList(
                                ArrayHelper::map(ProvinceOld::find()->all(), 'PROVINCE_ID', 'PROVINCE_NAME'), [
                            'id' => 'ddl-province-old',
                            'prompt' => 'เลือกจังหวัด'
                        ]);
                        ?>
                    </div>
                    <div class="col-md-4">
                        <?=
                        $form->field($model, 'person_amphur_old')->widget(DepDrop::classname(), [
                            'options' => ['id' => 'ddl-amphur-old'],
                            'data' => $amphur_old, //<---------
                            'pluginOptions' => [
                                'depends' => ['ddl-province-old'],
                                'placeholder' => 'เลือกอำเภอ...',
                                'url' => Url::to(['/person/get-amphur'])
                            ]
                        ]);
                        ?>
                    </div>
                    <div class="col-md-4">
                        <?=
                        $form->field($model, 'person_district_old')->widget(DepDrop::classname(), [
                            'data' => $district_old, //<---------
                            'pluginOptions' => [
                                'depends' => ['ddl-province-old', 'ddl-amphur-old'],
                                'placeholder' => 'เลือกตำบล...',
                                'url' => Url::to(['/person/get-district'])
                            ]
                        ]);
                        ?>
                    </div>      
                </div>

            </div>
        </div>



        <div class="panel panel-success">
            <div class="panel-heading"><span class="glyphicon glyphicon-book" aria-hidden="true"></span> ประวัติการศึกษา</div>
            <div class="panel-body">

                <div class="row">
                    <div class="col-md-5">
                        <div class="col-md-12"><br /></div>
                        <div class="col-md-12"><br /></div>
                        <div class="col-md-12">
                            <?= $form->field($model, 'person_education_title')->textInput(['maxlength' => true]) ?>
                        </div>
                        <div class="col-md-12">
                            <?php
                            //$url = \yii\helpers\Url::to('school-list', true);); //กำหนด URL ที่จะไปโหลดข้อมูล
                            $url = Url::to(['school-list']);
                            //$school = empty($model->id) ? '' : frontend\models\School::findOne($model->id)->school_name;

                            echo $form->field($model, 'person_education_graduate')->widget(Select2::classname(), [
                                'initValueText' => $school, //กำหนดค่าเริ่มต้น
                                //'data' => ArrayHelper::map(\frontend\models\School::find()->All(), 'SchoolID', 'SchoolName'),
                                'options' => ['placeholder' => 'เลือกชื่อสถาบัน/สภา/มหาวิทยาลัย ...'],
                                //'showToggleAll' => true,
                                'pluginOptions' => [
                                    'allowClear' => true,
                                    'maximumSelectionLength' => 3, //ต้องพิมพ์อย่างน้อย 3 อักษร ajax จึงจะทำงาน
                                    'ajax' => [
                                        'url' => $url,
                                        'dataType' => 'json', //รูปแบบการอ่านคือ json
                                        'data' => new JsExpression('function(params) { return {q:params.term};}'),
                                    ],
                                    'escapeMarkup' => new JsExpression('function(markup) { return markup;}'),
                                    'templateResult' => new JsExpression('function(school){ return school.text;}'),
                                    'templateSelection' => new JsExpression('function(school) {return school.text;}'),
                                ]
                            ]);
                            ?>
                            <!--?= $form->field($model, 'person_education_graduate')->textInput(['maxlength' => true]) ?-->
                        </div>
                        <div class="col-md-12">
                            <?=
                            $form->field($model, 'person_graduate')->widget(
                                    DatePicker::className(), [
                                'options' => ['placeholder' => 'คลิกเลือกวันที่จบการศึกษา'],
                                //'inline' => true,
                                'inline' => false,
                                //'template' => '<div class="well well-sm" style="background-color: #fff; width:250px">{input}</div>',
                                'language' => 'th',
                                'clientOptions' => [
                                    'autoclose' => true,
                                    'format' => 'yyyy-mm-d',
                                    'class' => 'form-control',
                                ]
                            ]);
                            ?>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="col-md-12">
                            <?= $form->field($model, 'person_education')->checkBoxList($model->getItemPersonEducation()) ?>
                            <!--?= $form->field($model, 'person_education')->inline()->checkBoxList($model->getItemPersonEducation()) ?-->
                            <!--?= $form->field($model, 'person_education')->dropdownList($model->getItemPersonEducation(), ['prompt' => 'เลือกวุฒิการศึกษา..']) ?-->
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="col-md-12">
                            <?= $form->field($model, 'person_education_professional')->checkBoxList($model->getItemPersonEducationProfessional()) ?>
                            <!--?= $form->field($model, 'person_education')->inline()->checkBoxList($model->getItemPersonEducation()) ?-->
                            <!--?= $form->field($model, 'person_education')->dropdownList($model->getItemPersonEducation(), ['prompt' => 'เลือกวุฒิการศึกษา..']) ?-->
                        </div>
                    </div>
                </div>

            </div>
        </div>




        <div class="panel panel-info">
            <div class="panel-heading"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> ประวัติรับราชการ</div>
            <div class="panel-body">

                <div class="row">
                    <div class="col-md-3">
                        <?= $form->field($model, 'person_type')->dropdownList($model->getItemPersonType(), ['prompt' => 'เลือกประเภท..']) ?>
                    </div>
                    <div class="col-md-3">
                        <?=
                        $form->field($model, 'person_worked')->widget(
                                DatePicker::className(), [
                            'options' => ['placeholder' => 'คลิกเลือกวันที่'],
                            //'inline' => true,
                            'inline' => false,
                            //'template' => '<div class="well well-sm" style="background-color: #fff; width:250px">{input}</div>',
                            'language' => 'th',
                            'clientOptions' => [
                                'autoclose' => true,
                                'format' => 'yyyy-mm-d',
                                'class' => 'form-control',
                            ]
                        ]);
                        ?>
                        <!--?= $form->field($model, 'person_worked')->textInput(['maxlength' => true]) ?-->
                    </div>
                    <div class="col-md-3">
                        <?=
                        $form->field($model, 'person_workin')->widget(
                                DatePicker::className(), [
                            'options' => ['placeholder' => 'คลิกเลือกวันที่'],
                            //'inline' => true,
                            'inline' => false,
                            //'template' => '<div class="well well-sm" style="background-color: #fff; width:250px">{input}</div>',
                            'language' => 'th',
                            'clientOptions' => [
                                'autoclose' => true,
                                'format' => 'yyyy-mm-d',
                                'class' => 'form-control',
                            ]
                        ]);
                        ?>
                        <!--?= $form->field($model, 'person_workin')->textInput(['maxlength' => true]) ?--> 
                    </div>
                    <div class="col-md-3">
                        <?= $form->field($model, 'person_position')->dropdownList($model->getItemPersonPosition(), ['prompt' => 'เลือกตำแหน่ง..']) ?>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-3">
                        <?= $form->field($model, 'person_level')->dropdownList($model->getItemPersonLevel(), ['prompt' => 'เลือกระดับ..']) ?>
                    </div>
                    <div class="col-md-3">
                        <?= $form->field($model, 'person_status_now')->dropdownList($model->getItemPersonStatusNow(), ['prompt' => 'เลือกสถานะปัจจุบัน..']) ?>
                    </div>
                    <div class="col-md-3">
                        <?= $form->field($model, 'person_potition_number')->textInput(['maxlength' => true]) ?>
                    </div>
                    <div class="col-md-3">
                        <?= $form->field($model, 'person_license_number')->textInput(['maxlength' => true]) ?>
                    </div>
                </div>


                <div class="row">
                    <div class="col-md-3">
                        <?=
                        $form->field($model, 'person_license_start')->widget(
                                DatePicker::className(), [
                            'options' => ['placeholder' => 'คลิกเลือกวันที่ออกใบอนุญาต'],
                            //'inline' => true,
                            'inline' => false,
                            //'template' => '<div class="well well-sm" style="background-color: #fff; width:250px">{input}</div>',
                            'language' => 'th',
                            'clientOptions' => [
                                'autoclose' => true,
                                'format' => 'yyyy-mm-d',
                                'class' => 'form-control',
                            ]
                        ]);
                        ?>
                    </div>
                    <div class="col-md-3">
                        <?=
                        $form->field($model, 'person_license_exp')->widget(
                                DatePicker::className(), [
                            'options' => ['placeholder' => 'คลิกเลือกวันหมดอายุ'],
                            //'inline' => true,
                            'inline' => false,
                            //'template' => '<div class="well well-sm" style="background-color: #fff; width:250px">{input}</div>',
                            'language' => 'th',
                            'clientOptions' => [
                                'autoclose' => true,
                                'format' => 'yyyy-mm-d',
                                'class' => 'form-control',
                            ]
                        ]);
                        ?>
                    </div>
                    <div class="col-md-3">
                        <?= $form->field($model, 'person_department')->dropdownList($model->getItemPersonDepartment(), ['prompt' => 'เลือกแผนก..']) ?>
                    </div>
                    <div class="col-md-3">
                        <?= $form->field($model, 'person_salary')->textInput(['maxlength' => true]) ?>
                    </div>
                </div>


                <div class="row">
                    <div class="col-md-3">
                        <?= $form->field($model, 'person_insurance')->textInput(['maxlength' => true]) ?>
                    </div>
                    <div class="col-md-3">
                        <?= $form->field($model, 'person_pts')->textInput(['maxlength' => true]) ?>
                    </div>
                    <div class="col-md-3">
                        <?= $form->field($model, 'person_cho')->textInput(['maxlength' => true]) ?>
                    </div>
                    <div class="col-md-3">
                        <?= $form->field($model, 'person_pay')->dropdownList($model->getItemPay(), ['prompt' => 'รับเงินเดือนจาก..']) ?>
                    </div>
                </div>


            </div>
        </div>







        <div class="form-group">
            <?= Html::submitButton($model->isNewRecord ? 'บันทึก' : 'บันทึก', ['class' => ($model->isNewRecord ? 'btn btn-success' : 'btn btn-success') . ' btn-lg btn-block']) ?>
        </div>

        <?php ActiveForm::end(); ?>

    </div>
</div>


<?php
/* $this->registerJs("
  var input1 = 'input[name=\"Person[person_education]\"]';
  setHideInput(11,$(input1).val(),'.field-person-person_education');
  $(input1).click(function(val){
  setHideInput(11,$(this).val(),'.field-person-person_education');
  });


  function setHideInput(set,value,objTarget)
  {
  console.log(set+'='+value);
  if(set==value)
  {
  $(objTarget).show(500);
  }
  else
  {
  $(objTarget).hide(500);
  }
  }
  "); */
?>
