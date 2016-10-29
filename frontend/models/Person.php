<?php

namespace frontend\models;

use Yii;
use yii\helpers\ArrayHelper;
use yii\behaviors\AttributeBehavior;
use yii\web\UploadedFile;
use yii\db\ActiveRecord;

class Person extends ActiveRecord {

    const SEX_MEN = 1;
    const SEX_WOMEN = 2;

    public $upload_foler = 'uploads';

    //public $age;

    public function behaviors() {
        return [
            [
                'class' => AttributeBehavior::className(),
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => 'person_education',
                    ActiveRecord::EVENT_BEFORE_UPDATE => 'person_education',
                ],
                'value' => function ($event) {
            //return implode(',', $this->person_education);
            return is_array($this->person_education) ? implode(',', $this->person_education) : NULL;
        },
            ],
            [
                'class' => AttributeBehavior::className(),
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => 'person_education_professional',
                    ActiveRecord::EVENT_BEFORE_UPDATE => 'person_education_professional',
                ],
                'value' => function ($event) {
            //return implode(',', $this->person_education);
            return is_array($this->person_education_professional) ? implode(',', $this->person_education_professional) : NULL;
        },
            ],
        ];
    }

    public static function itemsAlias($key) {

        $items = [
            'sex' => [
                self::SEX_MEN => 'ชาย',
                self::SEX_WOMEN => 'หญิง'
            ],
            'person_pname' => [
                1 => 'นาย',
                2 => 'นางสาว',
                3 => 'นาง'
            ],
            'person_blod' => [
                1 => 'A',
                2 => 'B',
                3 => 'O',
                4 => 'AB'
            ],
            'person_status' => [
                1 => 'โสด',
                2 => 'สมรส',
                3 => 'หม้าย',
                4 => 'อย่า',
                5 => 'ไม่ทราบ'
            ],
            'person_department' => [
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
                28 => 'พนักงานทำความสะอาด'
            ],
            'person_status_now' => [
                1 => 'ปฏิบัติงาน',
                2 => 'ย้าย',
                3 => 'ลาออก',
                4 => 'ลาศึกษาต่อ',
                5 => 'เกษียณ',
            ],
            'level' => [
                1 => 'ชำนาญการพิเศษ',
                2 => 'ชำนาญการ',
                3 => 'ชำนาญงาน',
                4 => 'ปฏิบัติการ',
                5 => 'ปฏิบัติงาน',
                6 => 'อื่นๆ',
            ],
            'person_position' => [
                1 => 'ผู้อำนวยการ รพ.เชียงคาน',
                2 => 'นายแพทย์',
                3 => 'ทันตแพทย์',
                4 => 'จพ.ทันตสาธารณสุข',
                5 => 'ผู้ช่วยทันตแพทย์',
                6 => 'เภสัชกร',
                7 => 'จพ.เภสัชกร',
                8 => 'ผู้ช่วยห้องยา',
                9 => 'หัวหน้าพยาบาล',
                10 => 'พยาบาลวิชาชีพ',
                11 => 'พยาบาลเทคนิค',
                12 => 'ผู้ช่วยพยาบาล',
                13 => 'พนักงานช่วยเหลือคนไข้',
                14 => 'นักเทคนิคการแพทย์',
                15 => 'จพ.วิทยาศาสตร์การแพทย์',
                16 => 'นักแผนไทย',
                17 => 'นักกายภาพบำบัด',
                18 => 'นักวิทยาศาสตร์การกีฬา',
                19 => 'จพ.เวชกิจฉุกเฉิน',
                20 => 'นักรังสีการแพทย์ ',
                21 => 'พนักงานการแพทย์และรังสีเทคนิค',
                22 => 'นักโภชนาการ',
                23 => 'นักจัดการงานทั่วไป',
                24 => 'นักวิชาการคอมพิวเตอร์',
                25 => 'พนักงานเครื่องคอมพิวเตอร์',
                26 => 'นักวิชาการเงินและบัญชี',
                27 => 'จพ.การเงินและบัญชี',
                28 => 'จพ.ธุรการ',
                29 => 'จพ.เวชสถิติ',
                30 => 'นักวิชาการสาธารณสุข',
                31 => 'จพ.สาธารณสุข',
                32 => 'จพ.โสต',
                33 => 'ผู้ช่วยเจ้าหน้าที่อนามัย',
                34 => 'พนักงานทั่วไป',
                35 => 'พนักงานบริการ',
                36 => 'เจ้าหน้าที่ห้องบัตร',
                37 => 'เจ้าหน้าที่บันทึกข้อมูล',
                38 => 'คนงานบริการด้านอาหาร',
                39 => 'นายช่างเทคนิค',
                40 => 'พนักงานประจำห้องยา',
                41 => 'จพ.งานสถิติ',
                42 => 'พนักงานเปล',
                43 => 'พนักงานขับรถยนต์',
                44 => 'ผู้ช่วยช่างทั่วไป',
                45 => 'ช่างตัดเย็บผ้า',
                46 => 'พนักงานรักษาความปลอดภัย',
                47 => 'นักวิทยาศาสตร์การแพทย์',
            ],
            'education' => [
                'ปริญญาเอก' => 'ปริญญาเอก',
                'ปริญญาโท' => 'ปริญญาโท',
                'ปริญญาตรี' => 'ปริญญาตรี',
                'อนุปริญญา' => 'อนุปริญญา',
                'มัธยมศึกษาตอนปลาย' => 'มัธยมศึกษาตอนปลาย',
                'มัธยมศึกษาตอนต้น' => 'มัธยมศึกษาตอนต้น',
                'ปวส' => 'ปวส',
                'ปวช' => 'ปวช',
                'กศน' => 'กศน',
                'ประถมศึกษา' => 'ประถมศึกษา',
                'อื่น' => 'อื่น...'
            ],
            'education_professional' => [
                'ปริญญาโทการปริหารการพยาบาล' => 'ปริญญาโทการปริหารการพยาบาล',
                'ปริญญาโทการพยาบาลครอบครัว' => 'ปริญญาโทการพยาบาลครอบครัว',
                'ปริญญาโท NIDA บริหารรัฐกิจ' => 'ปริญญาโท NIDA บริหารรัฐกิจ',
                'ปริญญาโทสาธารณสุขศาสตร์' => 'ปริญญาโทสาธารณสุขศาสตร์',
                'พยาบาลเวชปฏิบัติ' => 'พยาบาลเวชปฏิบัติ',
                'IC' => 'IC',
                'HD' => 'HD',
                'จิตเวช' => 'จิตเวช',
            ],
            'person_type' => [
                1 => 'ข้าราชการ',
                2 => 'พนักงานราชการ',
                3 => 'พนักงานกระทรวง',
                4 => 'ลูกจ้างประจำ',
                5 => 'ลูกจ้างชั่วคราว',
                6 => 'จ้างเหมารายเดือน',
                7 => 'จ้างเหมารายวัน',
                8 => 'อื่นๆ',
            ],
            'person_pay' => [
                1 => 'กรมบัญชีกลาง',
                2 => 'รพ.เชียงคาน',
                3 => 'อื่นๆ',
            ],
        ];
        return ArrayHelper::getValue($items, $key, []);
    }

    public static function tableName() {
        return 'person';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['person_id', 'person_age', 'person_province', 'person_amphur', 'person_district', 'person_level', 'person_potition_number', 'person_insurance', 'person_pts', 'person_cho'], 'integer'],
            [['person_pname', 'person_fullname', 'person_sex', 'person_type', 'person_position', 'person_department', 'person_pay', 'person_education_graduate', 'person_status_now'], 'required'],
            [['person_birthday', 'person_worked', 'person_workin',
            'person_cid', 'person_phon', 'person_province',
            'person_amphur', 'person_district',
            'person_province_old', 'person_amphur_old', 'person_district_old',
            'person_level', 'person_potition_number', 'person_education', 'person_education_professional', 'person_zipcode',
            'person_graduate', 'person_education_graduate', 'person_nickname',
            'person_license_start', 'person_license_exp'
                ], 'safe'],
            [['person_address'], 'string'],
            [['person_pname', 'person_sex', 'person_status', 'person_blod', 'person_email', 'person_nickname', 'age'], 'string', 'max' => 45],
            [['person_fullname',
            'person_oname',
            'person_may',
            'person_dad',
            'person_mum',
            'person_department',
            'person_status_now',
            'person_position',
            'person_license_number',
            'person_type',
            'person_education_title',
            'person_salary',
            'person_education_graduate',
            'person_pay',
            'person_address_old'],
                'string', 'max' => 255],
            [['person_photo'], 'file',
                'skipOnEmpty' => true,
                'extensions' => 'png,jpg'
            ]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'person_id' => 'รหัสบุคลากร',
            'person_cid' => 'รหัสบัตรประชาชน',
            'person_pname' => 'สรรพนาม',
            'person_fullname' => 'ชื่อ-นามสกุล',
            'person_oname' => 'นามสกุลเดิม',
            'person_birthday' => 'วันเกิด',
            //'person_age' => 'อายุ',
            'age' => 'อายุ',
            'age' => Yii::t('app', 'อายุ'),
            'birthday' => 'อายุ',
            'birthday' => Yii::t('app', 'วันเกิด'),
            'person_sex' => 'เพศ',
            'SexName' => Yii::t('app', 'เพศ'),
            'person_address' => 'ที่อยู่ปัจจุบันตามบัตรประจำตัวประชาชน',
            'person_address_old' => 'ที่อยู่ตามภูมิลำนำเดิม',
            'Status' => Yii::t('app', 'สถานะภาพ'),
            'person_status' => 'สถานะภาพ',
            'Blod' => Yii::t('app', 'หมู่เลือด'),
            'person_blod' => 'หมู่เลือด',
            'person_phon' => 'โทรศัพท์',
            'person_email' => 'Email',
            'person_worked' => 'วันที่บรรจุ',
            'person_workin' => 'วันที่เข้าทำงาน',
            'person_may' => 'ชื่อคู่สมรส',
            'person_dad' => 'ชื่อบิดา',
            'person_mum' => 'ชื่อมารดา',
            'Department' => Yii::t('app', 'ประจำแผนก'),
            'person_department' => 'ประจำแผนก',
            'StatusNow' => Yii::t('app', 'สถานะปัจจุบัน'),
            'person_status_now' => 'สถานะปัจจุบัน',
            'Position' => Yii::t('app', 'ตำแหน่ง'),
            'person_position' => 'ตำแหน่ง',
            'person_license_number' => 'เลขที่ใบประกอบ',
            'EducationName' => Yii::t('app', 'ระดับการศึกษา'),
            'person_education' => 'ระดับการศึกษา',
            'person_education_professional' => 'เชี่ยวชาญเฉพาะด้าน',
            'EducationProfessional' => Yii::t('app', 'เชี่ยวชาญเฉพาะด้าน'),
            'Type' => Yii::t('app', 'ประเภทตำแหน่ง'),
            'person_type' => 'ประเภท',
            'person_salary' => 'อัตราเงินเดือน',
            'person_pay' => 'รับเงินเดือนจาก',
            'person_photo' => 'รูปภาพ',
            'person_province' => 'จังหวัด',
            'person_amphur' => 'อำเภอ',
            'person_district_old' => 'ตำบล',
            'person_province_old' => 'จังหวัด',
            'person_amphur_old' => 'อำเภอ',
            'person_district' => 'ตำบล',
            'person_zipcode' => 'รหัสไปรษณี',
            'person_level' => 'ระดับ',
            'person_education_title' => 'สาขาวิชาที่สำเร็จการศึกษา',
            'person_insurance' => 'ประกันสังคม',
            'person_graduate' => 'วันที่สำเร็จการศึกษา',
            'person_education_graduate' => 'ชื่อสถาบัน/สภา/มหาวิทยาลัย',
            'person_pts' => 'พตส.',
            'person_cho' => 'ฉ.4/6/8/9',
            'LevelName' => Yii::t('app', 'ระดับ'),
            'person_potition_number' => 'เลขที่ตำแหน่ง',
            'person_nickname' => 'ชื่อเล่น',
            'person_license_start' => 'วันที่ออกใบอนุญาต',
            'person_license_exp' => 'วันหมดอายุใบอนุญาต',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTrainings() {
        return $this->hasMany(Training::className(), ['person_id' => 'id']);
    }

    public function getLeaves() {
        return $this->hasMany(Leave::className(), ['person_id' => 'id']);
    }

    public function getProvinces() {
        return $this->hasOne(Province::className(), ['province_id' => 'person_province']);
    }

    public function getAmphurs() {
        return $this->hasOne(Amphur::className(), ['amphur_id' => 'person_amphur']);
    }

    public function getDistricts() {
        return $this->hasOne(District::className(), ['district_id' => 'person_district']);
    }

    public function getProvinceOlds() {
        return $this->hasOne(ProvinceOld::className(), ['province_id' => 'person_province_old']);
    }

    public function getAmphurOlds() {
        return $this->hasOne(AmphurOld::className(), ['amphur_id' => 'person_amphur_old']);
    }

    public function getDistrictOlds() {
        return $this->hasOne(DistrictOld::className(), ['district_id' => 'person_district_old']);
    }

    public function getSchools() {
        return $this->hasOne(School::className(), ['id' => 'person_education_graduate']);
    }

    /**
     * @inheritdoc
     * @return PersonQuery the active query used by this AR class.
     */
    public static function find() {
        return new PersonQuery(get_called_class());
    }

    public function getItemPersonLevel() {
        return self::itemsAlias('level');
    }

    public function getLevelName() {
        return ArrayHelper::getValue($this->getItemPersonLevel(), $this->person_level);
    }

    public function getItemPersonSex() {
        return self::itemsAlias('sex');
    }

    public function getSexName() {
        return ArrayHelper::getValue($this->getItemPersonSex(), $this->person_sex);
    }

    public function getItemPersonPname() {
        return self::itemsAlias('person_pname');
    }

    public function getPName() {
        return ArrayHelper::getValue($this->getItemPersonPname(), $this->person_pname);
    }

    public function getItemPersonBlod() {
        return self::itemsAlias('person_blod');
    }

    public function getBlod() {
        return ArrayHelper::getValue($this->getItemPersonBlod(), $this->person_blod);
    }

    public function getItemPersonStatus() {
        return self::itemsAlias('person_status');
    }

    public function getStatus() {
        return ArrayHelper::getValue($this->getItemPersonStatus(), $this->person_status);
    }

    public function getItemPersonDepartment() {
        return self::itemsAlias('person_department');
    }

    public function getDepartment() {
        return ArrayHelper::getValue($this->getItemPersonDepartment(), $this->person_department);
    }

    public function getItemPersonStatusNow() {
        return self::itemsAlias('person_status_now');
    }

    public function getStatusNow() {
        return ArrayHelper::getValue($this->getItemPersonStatusNow(), $this->person_status_now);
    }

    public function getItemPersonPosition() {
        return self::itemsAlias('person_position');
    }

    public function getPosition() {
        return ArrayHelper::getValue($this->getItemPersonPosition(), $this->person_position);
    }

    public function getItemPersonEducation() {
        return self::itemsAlias('education');
    }

    public function getItemPersonEducationProfessional() {
        return self::itemsAlias('education_professional');
    }

    public function getItemPay() {
        return self::itemsAlias('person_pay');
    }
   

    public function getPayName() {
        return ArrayHelper::getValue($this->getItemPay(), $this->person_pay);
    }

    /* public function getEducation() {
      return ArrayHelper::getValue($this->getItemPersonEducation(), $this->person_education);
      } */

    public function getEducationName() {
        $educations = $this->getItemPersonEducation();
        $educationSelected = explode(',', $this->person_education);
        $educationSelectedName = [];
        foreach ($educations as $key => $educationName) {
            foreach ($educationSelected as $educationKey) {
                if ($key === $educationKey) {
                    $educationSelectedName[] = $educationName;
                }
            }
        }

        return implode(', ', $educationSelectedName);
    }

    public function educationToArray() {
        return $this->person_education = explode(',', $this->person_education);
    }

    public function getEducationProfessional() {
        $educations = $this->getItemPersonEducationProfessional();
        $educationSelected = explode(',', $this->person_education_professional);
        $educationSelectedName = [];
        foreach ($educations as $key => $educationProfessional) {
            foreach ($educationSelected as $educationKey) {
                if ($key === $educationKey) {
                    $educationSelectedName[] = $educationProfessional;
                }
            }
        }

        return implode(', ', $educationSelectedName);
    }

    public function educationProfessionalToArray() {
        return $this->person_education_professional = explode(',', $this->person_education_professional);
    }

    public function getItemPersonType() {
        return self::itemsAlias('person_type');
    }

    public function getType() {
        return ArrayHelper::getValue($this->getItemPersonType(), $this->person_type);
    }

    public function upload($model, $attribute) {
        $photo = UploadedFile::getInstance($model, $attribute);
        $path = $this->getUploadPath();
        if ($this->validate() && $photo !== null) {

            $fileName = md5($photo->baseName . time()) . '.' . $photo->extension;
            //$fileName = $photo->baseName . '.' . $photo->extension;
            if ($photo->saveAs($path . $fileName)) {
                return $fileName;
            }
        }
        return $model->isNewRecord ? false : $model->getOldAttribute($attribute);
    }

    public function getUploadPath() {
        return Yii::getAlias('@webroot') . '/' . $this->upload_foler . '/';
    }

    public function getUploadUrl() {
        return Yii::getAlias('@web') . '/' . $this->upload_foler . '/';
    }

    public function getPhotoViewer() {
        return empty($this->person_photo) ? Yii::getAlias('@web') . '/img/none.png' : $this->getUploadUrl() . $this->person_photo;
    }

    public function getOwnPhotosToArray() {
        return $this->getOldAttribute('person_photo') ? @explode(',', $this->getOldAttribute('person_photo')) : [];
    }

    public function getAge() {
        $model = self::find()
                        //->select(" TIMESTAMPDIFF(year, `person_birthday`, CURRENT_TIMESTAMP) AS `age`,person.* ")
                        ->select(" TIMESTAMPDIFF(year, `person_birthday`, CURRENT_TIMESTAMP) AS `age` ")
                        ->where(['id' => $this->id])
                        ->asArray()->One();
        return $model['age'];
    }

    public function getbirthday() {
        $model = self::find()
                        //->select(" TIMESTAMPDIFF(year, `person_birthday`, CURRENT_TIMESTAMP) AS `age`,person.* ")
                        ->select(" date_add(person_birthday, INTERVAL 543 YEAR) AS `birthday` ")
                        ->where(['id' => $this->id])
                        ->asArray()->One();
        return $model['birthday'];
    }

}
