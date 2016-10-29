<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Training */

$this->title = 'เพิ่มรายการอบรม';
$this->params['breadcrumbs'][] = ['label' => 'ทะเบียนฝึกอบรม', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="index-create">

    <center><h1><?= Html::encode($this->title) ?></h1></center>

    <?=
    $this->render('_form', [
        'model' => $model,
    ])
    ?>

</div>
