<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\TrainingSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="training-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'training_year') ?>

    <?= $form->field($model, 'training_name') ?>

    <?= $form->field($model, 'training_date') ?>

    <?= $form->field($model, 'training_budget') ?>

    <?php // echo $form->field($model, 'person_id') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
