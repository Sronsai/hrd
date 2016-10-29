<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

$this->title = $model->PersonName;
$this->params['breadcrumbs'][] = ['label' => 'ทะเบียนการลา', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="container">
    <div class="leave-view">

        <?=
        DetailView::widget([
            'model' => $model,
            'attributes' => [
                //'id',
                'PersonName',
                'YearName',
                //'leave_year',
                'TypeName',
                //'leave_type',
                'leave_start',
                'leave_end',
                'leave_total',
                'leave_address:ntext',
                'leave_cause:ntext',
                'leave_assign',
            ],
        ])
        ?>

        <center>
            <p>
                <?= Html::a('แก้ไข', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
                <?=
                Html::a('ลบ', ['delete', 'id' => $model->id], [
                    'class' => 'btn btn-danger',
                    'data' => [
                        'confirm' => 'Are you sure you want to delete this item?',
                        'method' => 'post',
                    ],
                ])
                ?>
            </p>
        </center>

    </div>
</div>
