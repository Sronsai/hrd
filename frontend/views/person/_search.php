<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\PersonSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="person-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'person_id') ?>

    <?= $form->field($model, 'person_cid') ?>

    <?= $form->field($model, 'person_pname') ?>

    <?= $form->field($model, 'person_fname') ?>

    <?php // echo $form->field($model, 'person_lname') ?>

    <?php // echo $form->field($model, 'person_oname') ?>

    <?php // echo $form->field($model, 'person_birthday') ?>

    <?php // echo $form->field($model, 'person_age') ?>

    <?php // echo $form->field($model, 'person_sex') ?>

    <?php // echo $form->field($model, 'person_address') ?>

    <?php // echo $form->field($model, 'person_status') ?>

    <?php // echo $form->field($model, 'person_blod') ?>

    <?php // echo $form->field($model, 'person_phon') ?>

    <?php // echo $form->field($model, 'person_email') ?>

    <?php // echo $form->field($model, 'person_worked') ?>

    <?php // echo $form->field($model, 'person_workin') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
