<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\Leave */

$this->title = 'เพิ่มรายการลา';
$this->params['breadcrumbs'][] = ['label' => 'ทะเบียนการลา', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="leave-create">

    <center><h1><?= Html::encode($this->title) ?></h1></center>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
