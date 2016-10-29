<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Person */

$this->title = 'แก้ไขข้อมูลบุคลากรของ ';
$name = $model->person_fullname;
$this->params['breadcrumbs'][] = ['label' => 'รายการบุคลากร', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->person_fullname, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'แก้ไข';
?>
<div class="person-update">

    <center><h1><?= Html::encode($this->title) ?><h2><?= $name ?></h2></h1></center>

    <?=
    $this->render('_form', [
        'model' => $model,
        'amphur' => $amphur,
        'district' => $district,
        'school' => $school,
        'amphur_old' => $amphur_old,
        'district_old' => $district_old,
    ])
    ?>

</div>
