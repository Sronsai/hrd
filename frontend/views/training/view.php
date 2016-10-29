<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\Training */

$this->title = $model->PersonName;
$this->params['breadcrumbs'][] = ['label' => 'ทะเบียนฝึกอบรม', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="container">
    <div class="training-view">
        
        <?=
        DetailView::widget([
            'model' => $model,
            'attributes' => [
                //'id',
                'PersonName',
                'YearName',
                //'training_year',
                'training_start',
                'training_end',
                'training_book_number',
                'TypeName',
                'TrainingName',
                //'training_type',
                'training_total',
                'training_unit',
                'training_budget',
                'training_course',
                'training_location',
                'training_expectations',
                'ActionsName',
            //'person_id',
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
