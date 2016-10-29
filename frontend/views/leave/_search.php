<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\LeaveSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="leave-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'person_id') ?>

    <?= $form->field($model, 'leave_year') ?>

    <?= $form->field($model, 'leave_type') ?>

    <?= $form->field($model, 'leave_start') ?>

    <?php // echo $form->field($model, 'leave_end') ?>

    <?php // echo $form->field($model, 'leave_total') ?>

    <?php // echo $form->field($model, 'leave_address') ?>

    <?php // echo $form->field($model, 'leave_cause') ?>

    <?php // echo $form->field($model, 'leave_assign') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
