<?php

namespace frontend\models;

use Yii;
use yii\helpers\ArrayHelper;

class Leave extends \yii\db\ActiveRecord {

    const lEAVE_VACATION = 1;
    const lEAVE_SICK = 2;
    const lEAVE_MATERNITY = 3;
    const lEAVE_ORDAIN = 4;
    const lEAVE_MISSION = 5;

    public static function itemsAlias($key) {
        $items = [
            'type' => [
                self::lEAVE_VACATION => 'ลาพักผ่อน',
                self::lEAVE_SICK => 'ลาป่วย',
                self::lEAVE_MATERNITY => 'ลาคลอด',
                self::lEAVE_ORDAIN => 'ลาบวช',
                self::lEAVE_MISSION => 'ลากิจส่วนตัว',
            ],
            'year' => [
                1 => '2559',
                2 => '2560',
                3 => '2561',
                4 => '2562',
                5 => '2563',
            ],
            'name' => [
                1 => 'นายดนัย สอนไสย'
            ],
        ];
        return ArrayHelper::getValue($items, $key, []);
    }

    public static function tableName() {
        return 'leave';
    }

    public function rules() {
        return [
            [['person_id', 'leave_total'], 'integer'],
            [['leave_year', 'leave_type', 'leave_start', 'leave_end', 'leave_total'], 'required'],
            [['leave_start', 'leave_end'], 'safe'],
            [['leave_address', 'leave_cause'], 'string'],
            [['leave_year', 'leave_type', 'leave_assign'], 'string', 'max' => 100]
        ];
    }

    public function attributeLabels() {
        return [
            'id' => 'ID',
            'PersonName' => Yii::t('app', 'ชื่อ - นามสกุล'),
            'person_id' => 'ชื่อ - นามสกุล',
            'YearName' => Yii::t('app', 'ปีงบประมาณ'),
            'leave_year' => 'ปีงบประมาณ',
            'TypeName' => Yii::t('app', 'ประเภทการลา'),
            'leave_type' => 'ประเภทการลา',
            'leave_start' => 'ลาตั้งแต่วันที่',
            'leave_end' => 'ถึงวันที่',
            'leave_total' => 'จำนวนวันลา',
            'leave_address' => 'ที่อยู่ที่สามารถติดต่อได้',
            'leave_cause' => 'รายละเอียด',
            'leave_assign' => 'มอบหมายงานให้',
        ];
    }

    public function getPersons() {
        return $this->hasOne(Person::className(), ['id' => 'person_id']);
    }

    public function getItemLeaveType() {
        return self::itemsAlias('type');
    }

    public function getTypeName() {
        return ArrayHelper::getValue($this->getItemLeaveType(), $this->leave_type);
    }

    public function getItemLeaveYear() {
        return self::itemsAlias('year');
    }

    public function getYearName() {
        return ArrayHelper::getValue($this->getItemLeaveYear(), $this->leave_year);
    }

    public function getItemPersonID() {
        return self::itemsAlias('name');
    }

    public function getPersonName() {
        return ArrayHelper::getValue($this->getItemPersonID(), $this->person_id);
    }

}
