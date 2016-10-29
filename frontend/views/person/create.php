<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Person */

$this->title = 'เพิ่มบุคลากร';
$this->params['breadcrumbs'][] = ['label' => 'รายการบุคลากร', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="index-create">

    <h1><center><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> <?= Html::encode($this->title) ?><center></h1>

                <?=
                $this->render('_form', [
                    'model' => $model,
                    'amphur' => [],
                    'district' => [],
                    'school' => [],
                    'amphur_old' => [],
                    'district_old' => [],
                ])
                ?>

                </div>
