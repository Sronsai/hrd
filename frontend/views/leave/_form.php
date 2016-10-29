<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use dosamigos\datepicker\DatePicker;
use kartik\widgets\Select2;
?>

<div class="container">
    <div class="index-form">

        <?php $form = ActiveForm::begin(); ?>

        <div class="panel panel-info">
            <div class="panel-heading">ข้อมูลการลา</div>
            <div class="panel-body">

                <?=
                $form->field($model, 'person_id')->widget(Select2::classname(), [
                    'data' => ArrayHelper::map(\frontend\models\Person::find()->all(), 'id', 'person_fullname'),
                    'options' => ['placeholder' => 'เลือกผู้ใช้งาน ...'],
                    'pluginOptions' => [
                        'allowClear' => true
                    ],
                ]);
                ?>
                <!--?=
                $form->field($model, 'person_id')->dropDownList(
                        ArrayHelper::map(\frontend\models\Person::find()->all(), 'id', 'person_fullname'), ['prompt' => 'เลือกบุคลากร...'])
                ?--> 

                <?= $form->field($model, 'leave_year')->dropdownList($model->getItemLeaveYear(), ['prompt' => 'เลือกปี พ.ศ...']) ?>
                <!--?= $form->field($model, 'leave_year')->textInput(['maxlength' => true]) ?-->


                <div class="row">
                    <div class="col-md-5">
                        <?= $form->field($model, 'leave_type')->radioList($model->getItemLeaveType()) ?>
                        <!--?= $form->field($model, 'leave_type')->textInput(['maxlength' => true]) ?-->
                    </div>
                    <div class="col-md-3">
                        <?=
                        $form->field($model, 'leave_start')->widget(
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
                        <!--?=
                        DatePicker::widget([
                            'model' => $model,
                            'attribute' => 'leave_start',
                            'template' => '{addon}{input}',
                            'language' => 'th',
                            'clientOptions' => [
                                'autoclose' => true,
                                'format' => 'dd-M-yyyy',
                                'class' => 'form-control',
                            ]
                        ]);
                        ?-->
                        <!--?= $form->field($model, 'leave_start')->textInput() ?-->
                    </div>
                    <div class="col-md-3">
                        <?=
                        $form->field($model, 'leave_end')->widget(
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
                        <!--?= $form->field($model, 'leave_end')->textInput() ?-->
                    </div>
                </div>

                <?= $form->field($model, 'leave_total')->textInput() ?>

                <?= $form->field($model, 'leave_address')->textarea(['rows' => 2]) ?>

                <?= $form->field($model, 'leave_cause')->textarea(['rows' => 2]) ?>

                <?= $form->field($model, 'leave_assign')->textInput(['maxlength' => true]) ?>

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
