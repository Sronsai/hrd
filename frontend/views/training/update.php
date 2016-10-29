<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Training */

$this->title = 'แก้ไขข้อมูลฝึกอบรมของ  ' . ' ' . $model->PersonName;
$this->params['breadcrumbs'][] = ['label' => 'ทะเบียนฝึกอบรม', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->PersonName, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'แก้ไข';
?>
<div class="training-update">

    <center><h1><?= Html::encode($this->title) ?></h1></center>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
