<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "lookup_department".
 *
 * @property integer $id
 * @property string $department_name
 */
class LookupDepartment extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'lookup_department';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'required'],
            [['id'], 'integer'],
            [['department_name'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'department_name' => 'Department Name',
        ];
    }
}
