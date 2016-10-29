<?php

use yii\helpers\Html;
use yii\helpers\Url;
//use yii\widgets\ActiveForm;
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;
use dosamigos\datepicker\DatePicker;
use kartik\select2\Select2;
use wbraganca\tagsinput\TagsinputWidget;
?>

<!--?php \yii\helpers\VarDumper::dump($model->Fullname); ?-->
<!--?php \yii\helpers\VarDumper::dump($model->NameFull); ?-->

<div class="container">
    <div class="index-form">

        <?php $form = ActiveForm::begin(); ?>

        <div class="panel panel-info">
            <div class="panel-heading">ข้อมูลการฝึกอบรม</div>
            <div class="panel-body">

                <?=
                $form->field($model, 'person_id')->widget(Select2::classname(), [
                    'data' => ArrayHelper::map(\frontend\models\Person::find()->all(), 'id', 'person_fullname'),
                    'options' => ['placeholder' => 'เลือกผู้อบรม ...'],
                    'pluginOptions' => [
                        'allowClear' => true
                    ],
                ]);
                ?>
                <!--?=
                $form->field($model, 'person_id')->dropDownList(
                        ArrayHelper::map(\frontend\models\Person::find()->all(), 'id', 'person_fullname'), ['prompt' => 'เลือกบุคลากร...'])
                ?--> 

                <?= $form->field($model, 'training_year')->dropdownList($model->getItemTrainingYear(), ['prompt' => 'เลือกปีงบประมาณ ...']) ?>
                <!--?= $form->field($model, 'training_year')->textInput(['maxlength' => true]) ?-->

                <div class="row">
                    <div class="col-md-3">
                        <?= $form->field($model, 'training_type')->inline()->radioList($model->getItemTrainingType()) ?>

                        <?= $form->field($model, 'training_blog')->textInput() ?>
                    </div>

                    <div class="col-md-3">
                        <?=
                        $form->field($model, 'training_start')->widget(
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
                        <!--?= $form->field($model, 'training_start')->textInput() ?-->
                    </div>

                    <div class="col-md-3">
                        <?=
                        $form->field($model, 'training_end')->widget(
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
                        <!--?= $form->field($model, 'training_end')->textInput() ?-->
                    </div>

                    <div class="col-md-3">
                        <?= $form->field($model, 'training_department')->dropdownList($model->getItemTrainingDepartment(), ['prompt' => 'เลือกหน่วยงานที่จัดอบรม..']) ?>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-3">
                        <?= $form->field($model, 'training_book_number')->textInput() ?>
                    </div>
                    <div class="col-md-3">
                        <?= $form->field($model, 'training_total')->textInput() ?>
                    </div>
                    <div class="col-md-3">
                        <?= $form->field($model, 'training_unit')->textInput() ?>
                    </div>
                    <div class="col-md-3">
                        <?= $form->field($model, 'training_budget')->textInput(['maxlength' => true]) ?>
                    </div>
                </div>


                <?= $form->field($model, 'training_course')->textarea(['rows' => 2]) ?>

                <?= $form->field($model, 'training_location')->textarea(['rows' => 2]) ?>

                <!--?= $form->field($model, 'training_join')->textarea(['rows' => 2]) ?-->
                <!--?= $form->field($model, 'training_join')->checkBoxList($model->getFullname()) ?-->
                <?=
                $form->field($model, 'training_join')->widget(Select2::classname(), [
                    //'data' => $model->getFullname(),// เอา id มา save
                    'data' => ArrayHelper::map(\frontend\models\Person::find()->all(), 'person_fullname', 'person_fullname'), // เอา fullname มา save
                    'language' => 'th',
                    'options' => ['multiple' => true, 'class' => 'form-control', 'placeholder' => 'เลือกผู้อบรม ...'],
                    'pluginOptions' => [
                        //'tags' => true,
                        'allowClear' => true
                    ],
                ])->label(true);
                ?>

                <?= $form->field($model, 'training_conclude')->textarea(['rows' => 2]) ?>

                <?= $form->field($model, 'training_expectations')->textarea(['rows' => 2]) ?>

                <center><?= $form->field($model, 'training_actions')->radioList($model->getItemTrainingActions()) ?></center>



                <!--?= $form->field($model, 'person_id')->textInput() ?-->

            </div>
        </div>
        <center>
            <div class="form-group">
                <?= Html::submitButton($model->isNewRecord ? 'บันทึก' : 'บันทึก', ['class' => ($model->isNewRecord ? 'btn btn-success' : 'btn btn-success') . ' btn-lg btn-block']) ?>
            </div>
        </center>

        <?php ActiveForm::end(); ?>

    </div>
</div>


<?php
$this->registerJs("
  var input1 = 'input[name=\"Training[training_type]\"]';
  setHideInput(2,$(input1).val(),'.field-training-training_blog');
  $(input1).click(function(val){
    setHideInput(2,$(this).val(),'.field-training-training_blog');
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
");
?>

