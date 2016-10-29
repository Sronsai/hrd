<?php

namespace frontend\models;

use Yii;

class Province extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'province';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['PROVINCE_CODE', 'PROVINCE_NAME'], 'required'],
            [['GEO_ID'], 'integer'],
            [['PROVINCE_CODE'], 'string', 'max' => 2],
            [['PROVINCE_NAME'], 'string', 'max' => 150]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'PROVINCE_ID' => 'Province  ID',
            'PROVINCE_CODE' => 'Province  Code',
            'PROVINCE_NAME' => 'Province  Name',
            'GEO_ID' => 'Geo  ID',
        ];
    }

    /* public function getPersons(){
      return $this->hasMany(Province::className(), ['person_province' => 'person_province']);
      } */
}
