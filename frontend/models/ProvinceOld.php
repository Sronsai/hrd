<?php

namespace frontend\models;

use Yii;

class ProvinceOld extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'province_old';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
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
    public function attributeLabels()
    {
        return [
            'PROVINCE_ID' => 'Province  ID',
            'PROVINCE_CODE' => 'Province  Code',
            'PROVINCE_NAME' => 'Province  Name',
            'GEO_ID' => 'Geo  ID',
        ];
    }
}
