<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Leave */

$this->title = 'แก้ไขข้อมูลการลาของ ' . ' ' .$model->PersonName;
$this->params['breadcrumbs'][] = ['label' => 'ทะเบียนการลา', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->PersonName, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'แก้ไข';
?>
<div class="leave-update">

    <center><h1><?= Html::encode($this->title) ?></h1></center>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
