<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "school".
 *
 * @property integer $id
 * @property string $school_name
 */
class School extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'school';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'required'],
            [['id'], 'integer'],
            [['school_name'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'school_name' => 'School Name',
        ];
    }

    
    public static function find()
    {
        return new SchoolQuery(get_called_class());
    }
}
