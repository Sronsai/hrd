<?php

namespace frontend\models;

use Yii;
use yii\helpers\ArrayHelper;
use frontend\models\Person;
use yii\behaviors\AttributeBehavior;
use yii\db\ActiveRecord;

class Training extends \yii\db\ActiveRecord {

    public $Person;

    const TRANING_IN = 1;
    const TRANING_OUT = 2;
 
    public function behaviors() {
        return [
            [
                'class' => AttributeBehavior::className(),
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => 'training_join',
                    ActiveRecord::EVENT_BEFORE_UPDATE => 'training_join',
                ],
                'value' => function ($event) {
            //return implode(',', $this->training_join);
            return is_array($this->training_join) ? implode(',', $this->training_join) : NULL;
        },
            ],
        ];
    }

    public function trainingToArray() {
        return $this->training_join = explode(',', $this->training_join);
    }

    public function getFullname() {
        return ArrayHelper::map(\frontend\models\Person::find()->all(), 'id', 'person_fullname');
    }

    public function getFullnames() {
        return $this->training_join;
    }

    public function getPerson() {
        return $this->hasOne(Person::className(), ['id' => 'person_id']);
    }

    public function getItemPersonID() {
        return self::itemsAlias('person_id');
    }

    public function getPersonName() {
        return ArrayHelper::getValue($this->getItemPersonID(), $this->person_id);
    }

    public static function itemsAlias($key) {
        $items = [
            'type' => [
                self::TRANING_IN => 'ภายใน',
                self::TRANING_OUT => 'ภายนอก'
            ],
            'training_year' => [
                1 => '2559',
                2 => '2560',
                3 => '2561',
                4 => '2562',
                5 => '2563',
            ],
            'training_department' => [
                1 => 'องค์กรแพทย์',
                2 => 'ทันตกรรม',
                3 => 'พยาธิวิทยา',
                4 => 'รังสีวิทยา',
                5 => 'เภสัชกรรม',
                6 => 'องค์กรแพทย์',
                7 => 'ส่งเสริมสุขภาพ/เวช',
                8 => 'แพทย์แผนไทย',
                9 => 'กายภาพบำบัด',
                10 => 'วิทยาศาสตร์การกีฬา',
                11 => 'ผู้ป่วยนอก',
                12 => 'ผู้ป่วยใน',
                13 => 'อุบัติเหตุ/ฉุกเฉิน',
                14 => 'ห้องคลอด/ผ่าตัด',
                15 => 'คลินิกพิเศษ',
                16 => 'เวชระเบียน',
                17 => 'จ่ายกลาง',
                18 => 'ซักฟอก',
                19 => 'โภชนาการ',
                20 => 'เทคโนโลยีสารสนเทศ',
                21 => 'ศูนย์ประกันสุขภาพ',
                22 => 'บริหาร',
                23 => 'การเงิน/บัญชี',
                24 => 'พัสดุ/ธุรการ',
                25 => 'ข้อมูล/สถิติ',
                26 => 'ยานพาหนะ',
                27 => 'ซ่อมบำรุง/สนาม/บำบัดน้ำเสีย',
            ],
            'actions' => [
                1 => 'ยังไม่ได้ทำ',
                2 => 'ทำแล้ว',
            ],
                /* 'person_id' => [
                  1 => 'นายดนัย สอนไสย'
                  ], */
        ];
        return ArrayHelper::getValue($items, $key, []);
    }

    public static function tableName() {
        return 'training';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['training_year', 'training_start', 'training_end', 'person_id', 'training_type', 'training_total'], 'required'],
            [['training_start', 'training_end', 'training_actions', 'training_budget', 'person', 'training_join', 'fullNames'], 'safe'],
            [['person_id', 'training_total', 'training_budget'], 'integer'],
            [['training_course', 'training_location', 'training_expectations', 'training_conclude'], 'string'],
            [['training_year', 'training_budget', 'training_unit'], 'string', 'max' => 45],
            //[['training_join'], 'string', 'max' => 255],
            [['training_book_number', 'training_type', 'training_department', 'training_blog'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'YearName' => Yii::t('app', 'ปีงบประมาณ'),
            'training_year' => 'ปีงบประมาณ',
            'training_start' => 'ตั้งแต่วันที่',
            'training_end' => 'ถึงวันที่',
            'TypeName' => Yii::t('app', 'ประเภทการอบรม'),
            'training_type' => 'ประเภทการอบรม',
            'training_total' => 'จำนวนชั่วโมง',
            'training_unit' => 'หน่วยคะแนน',
            'training_budget' => 'งบประมาณ',
            'training_book_number' => 'เลขที่หนังสือ',
            'training_course' => 'ชื่อหลักสูตรอบรม',
            'training_location' => 'สถานที่อบรม',
            'person_id' => 'ชื่อ - นามสกุล',
            'PersonName' => Yii::t('app', 'ชื่อ - นามสกุล'),
            'training_department' => 'หน่วยงานที่จัดอบรม(ภายใน)',
            'TrainingName' => Yii::t('app', 'หน่วยงานที่จัดอบรม'),
            'training_expectations' => 'สิ่งที่จะดำเนินการหลังจากอบรม',
            'training_actions' => 'ดำเนินการ',
            'ActionsName' => Yii::t('app', 'ดำเนินการ'),
            'training_join' => 'ผู้ร่วมอบรม',
            'training_conclude' => 'สรุปประเด็นสำคัญ',
            'person' => 'ผู้ขออบรม ',
            'training_blog' => 'ระบุหน่วยงานที่จัดอบรม(ภายนอก)',
            'nameFull' => Yii::t('app', 'ผู้เข้าร่วมประชุม')
                //'fullName' => Yii::t('app', 'ชื่อ-นามสกุล'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    /* public function getFullname() {
      return $this->person_pname . $this->person_fullname;
      } */

    public function getItemTrainingActions() {
        return self::itemsAlias('actions');
    }

    public function getActionsName() {
        return ArrayHelper::getValue($this->getItemTrainingActions(), $this->training_actions);
    }

    public function getItemTrainingDepartment() {
        return self::itemsAlias('training_department');
    }

    public function getTrainingName() {
        return ArrayHelper::getValue($this->getItemTrainingDepartment(), $this->training_department);
    }

    public function getItemTrainingType() {
        return self::itemsAlias('type');
    }

    public function getTypeName() {
        return ArrayHelper::getValue($this->getItemTrainingType(), $this->training_type);
    }

    public function getItemTrainingYear() {
        return self::itemsAlias('training_year');
    }

    public function getYearName() {
        return ArrayHelper::getValue($this->getItemTrainingYear(), $this->training_year);
    }

}
