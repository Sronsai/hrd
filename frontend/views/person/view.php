<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use dixonsatit\thaiYearFormatter\ThaiYearFormatter;

/* @var $this yii\web\View */
/* @var $model frontend\models\Person */

$this->title = $model->person_fullname;
$this->params['breadcrumbs'][] = ['label' => 'รายการบุคลากร', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
$time = time();
?>

<div class="container">
    <div class="person-view">

        <!--h1><!--?= Html::encode($this->title) ?></h1-->

        <?=
        DetailView::widget([
            'model' => $model,
            'attributes' => [
                //'id',
                [
                    'format' => 'raw',
                    'attribute' => 'person_photo',
                    'value' => Html::img($model->photoViewer, ['class' => 'img-thumbnail', 'style' => 'width:200px;'])
                ],
                'person_id',
                'Type',
                'Department',
                'StatusNow',
                //'person_pname',
                'person_cid',
                'person_fullname',
                'person_oname',
                'SexName',
                'Position',
                'LevelName',
                'person_license_number',
                'person_potition_number',
                'person_insurance',
                //'person_graduate',
                [
                    'attribute' => 'person_graduate',
                    'value' => 'person_graduate',
                    'value' => 'วันที่ ' . Yii::$app->thaiFormatter->asDate($model->person_graduate, 'long') /* . ' เวลา ' . Yii::$app->thaiFormatter->asTime($model->person_birthday, 'medium') */
                ],
                [
                    'attribute' => 'person_education_graduate',
                    'value' => $model->schools->school_name,
                ],
                'EducationName',
                //'person_birthday',
                [
                    'attribute' => 'person_birthday',
                    'value' => 'risk_date',
                    'value' => 'วันที่ ' . Yii::$app->thaiFormatter->asDate($model->person_birthday, 'long') /* . ' เวลา ' . Yii::$app->thaiFormatter->asTime($model->person_birthday, 'medium') */
                ],
                //'person_age',
                [
                    'attribute' => 'age',
                    'value' => $model->age,
                ],
                'person_address:ntext',
                //'person_province',
                [
                    'attribute' => 'person_district',
                    'value' => $model->districts->DISTRICT_NAME,
                ],
                [
                    'attribute' => 'person_amphur',
                    'value' => $model->amphurs->AMPHUR_NAME,
                ],
                [
                    'attribute' => 'person_province',
                    'value' => $model->provinces->PROVINCE_NAME,
                ],
                'person_zipcode',
                'Blod',
                'person_phon',
                'person_email:email',
                //'person_worked',
                [
                    'attribute' => 'person_worked',
                    'value' => 'person_worked',
                    'value' => 'วันที่ ' . Yii::$app->thaiFormatter->asDate($model->person_worked, 'long') /* . ' เวลา ' . Yii::$app->thaiFormatter->asTime($model->person_birthday, 'medium') */
                ],
                //'person_workin',
                [
                    'attribute' => 'person_workin',
                    'value' => 'person_workin',
                    'value' => 'วันที่ ' . Yii::$app->thaiFormatter->asDate($model->person_workin, 'long') /* . ' เวลา ' . Yii::$app->thaiFormatter->asTime($model->person_birthday, 'medium') */
                ],
                'Status',
                'person_may',
                'person_dad',
                'person_mum',
                'person_pts',
                'person_cho',
                'person_salary',
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
