<?php

namespace frontend\controllers;

use Yii;
use yii\web\Controller;

class ReportController extends controller {

    public $enableCsrfValidation = false;

    public function actionIndex() {

        return $this->render('index');
    }

    public function actionReport1() {

        $department = '';

        if (Yii::$app->request->isPost) {
            $department = $_POST['department_name'];
        }

        $sql = " SELECT p.person_id,p.person_cid,
                CASE person_pname 
                WHEN '1' THEN 'นาย' 
                WHEN '2' THEN 'นางสาว' 
                WHEN '3' THEN 'นาง' 
                ELSE 'ไม่ทราบ'
                END AS person_pname,
                p.person_fullname,date_add(p.person_birthday, INTERVAL 543 YEAR) as person_birthday,
                TIMESTAMPDIFF(year, person_birthday, CURRENT_TIMESTAMP) AS person_age,
                lp.position_name,
                CASE person_sex 
                WHEN '1' THEN 'ชาย' 
                WHEN '2' THEN 'หญิง' 
                ELSE 'ไม่ทราบ'
                END AS person_sex,
                p.person_address,ls.statusnow_name,p.person_phon,
                l.department_name,p.person_phon,lt.type_name,
                date_add(p.person_worked, INTERVAL 543 YEAR) as person_worked
                FROM person p
                LEFT OUTER JOIN lookup_department l ON l.id = p.person_department
                LEFT OUTER JOIN lookup_status_now ls ON ls.id = p.person_status
                LEFT OUTER JOIN lookup_position lp ON lp.id = p.person_position
                LEFT OUTER JOIN lookup_type lt ON lt.id = p.person_type 
                WHERE p.person_status_now = '1'
                AND p.person_department = '' ";

        if ($department != '') {
            $sql = " SELECT p.person_id,p.person_cid,
                CASE person_pname 
                WHEN '1' THEN 'นาย' 
                WHEN '2' THEN 'นางสาว' 
                WHEN '3' THEN 'นาง' 
                ELSE 'ไม่ทราบ'
                END AS person_pname,
                p.person_fullname,date_add(p.person_birthday, INTERVAL 543 YEAR) as person_birthday,
                TIMESTAMPDIFF(year, person_birthday, CURRENT_TIMESTAMP) AS person_age,
                lp.position_name,
                CASE person_sex 
                WHEN '1' THEN 'ชาย' 
                WHEN '2' THEN 'หญิง' 
                ELSE 'ไม่ทราบ'
                END AS person_sex,
                p.person_address,ls.statusnow_name,p.person_phon,
                l.department_name,p.person_phon,lt.type_name,
                date_add(p.person_worked, INTERVAL 543 YEAR) as person_worked
                FROM person p
                LEFT OUTER JOIN lookup_department l ON l.id = p.person_department
                LEFT OUTER JOIN lookup_status_now ls ON ls.id = p.person_status
                LEFT OUTER JOIN lookup_position lp ON lp.id = p.person_position
                LEFT OUTER JOIN lookup_type lt ON lt.id = p.person_type
                WHERE p.person_status_now = '1'
                AND p.person_department = $department ";
        }

        try {
            $rawData = \Yii::$app->db->createCommand($sql)->queryAll();
        } catch (\yii\db\Exception $e) {
            throw new \yii\web\ConflictHttpException('sql error');
        }
        $dataProvider = new \yii\data\ArrayDataProvider([
            //'key' => 'hoscode',
            'allModels' => $rawData,
            'pagination' => FALSE,
                /* 'pagination' => [
                  'pageSize' => 10,
                  ], */
        ]);


        return $this->render('report1', [
                    'dataProvider' => $dataProvider,
                    'rawData' => $rawData,
                    'sql' => $sql,
                    'department' => $department,
        ]);
    }

    public function actionReport2() {

        $department = '';
        $type = '';

        if (Yii::$app->request->isPost) {
            $department = $_POST['department_name'];
            $type = $_POST['type_name'];
        }

        $sql = " SELECT p.person_id,p.person_cid,
                CASE person_pname 
                WHEN '1' THEN 'นาย' 
                WHEN '2' THEN 'นางสาว' 
                WHEN '3' THEN 'นาง' 
                ELSE 'ไม่ทราบ'
                END AS person_pname,
                p.person_fullname,date_add(p.person_birthday, INTERVAL 543 YEAR) as person_birthday,
                TIMESTAMPDIFF(year, person_birthday, CURRENT_TIMESTAMP) AS person_age,
                lp.position_name,
                CASE person_sex 
                WHEN '1' THEN 'ชาย' 
                WHEN '2' THEN 'หญิง' 
                ELSE 'ไม่ทราบ'
                END AS person_sex,
                p.person_address,ls.statusnow_name,p.person_phon,
                l.department_name,p.person_phon,lt.type_name,
                date_add(p.person_worked, INTERVAL 543 YEAR) as person_worked
                FROM person p
                LEFT OUTER JOIN lookup_department l ON l.id = p.person_department
                LEFT OUTER JOIN lookup_status_now ls ON ls.id = p.person_status
                LEFT OUTER JOIN lookup_position lp ON lp.id = p.person_position
                LEFT OUTER JOIN lookup_type lt ON lt.id = p.person_type 
                WHERE p.person_status_now = '1'
                AND p.person_department = '$department' ";

        if ($type != '') {
            $sql = " SELECT p.person_id,p.person_cid,
                CASE person_pname 
                WHEN '1' THEN 'นาย' 
                WHEN '2' THEN 'นางสาว' 
                WHEN '3' THEN 'นาง' 
                ELSE 'ไม่ทราบ'
                END AS person_pname,
                p.person_fullname,date_add(p.person_birthday, INTERVAL 543 YEAR) as person_birthday,
                TIMESTAMPDIFF(year, person_birthday, CURRENT_TIMESTAMP) AS person_age,
                lp.position_name,
                CASE person_sex 
                WHEN '1' THEN 'ชาย' 
                WHEN '2' THEN 'หญิง' 
                ELSE 'ไม่ทราบ'
                END AS person_sex,
                p.person_address,ls.statusnow_name,p.person_phon,
                l.department_name,p.person_phon,lt.type_name,
                date_add(p.person_worked, INTERVAL 543 YEAR) as person_worked
                FROM person p
                LEFT OUTER JOIN lookup_department l ON l.id = p.person_department
                LEFT OUTER JOIN lookup_status_now ls ON ls.id = p.person_status
                LEFT OUTER JOIN lookup_position lp ON lp.id = p.person_position
                LEFT OUTER JOIN lookup_type lt ON lt.id = p.person_type
                WHERE p.person_status_now = '1'
                AND p.person_department = '$department'
                AND p.person_type = '$type' ";
        }

        try {
            $rawData = \Yii::$app->db->createCommand($sql)->queryAll();
        } catch (\yii\db\Exception $e) {
            throw new \yii\web\ConflictHttpException('sql error');
        }
        $dataProvider = new \yii\data\ArrayDataProvider([
            //'key' => 'hoscode',
            'allModels' => $rawData,
            'pagination' => FALSE,
                /* 'pagination' => [
                  'pageSize' => 10,
                  ], */
        ]);


        return $this->render('report2', [
                    'dataProvider' => $dataProvider,
                    'rawData' => $rawData,
                    'sql' => $sql,
                    'type' => $type,
                    'department' => $department,
        ]);
    }

    public function actionReport3() {

        $sql = ' SELECT person_education,COUNT(person_education) AS total FROM person
                  WHERE person_status_now = "1" AND person_education <>""
                  GROUP BY person_education ORDER BY total DESC ';

        try {
            $rawData = \Yii::$app->db->createCommand($sql)->queryAll();
        } catch (\yii\db\Exception $e) {
            throw new \yii\web\ConflictHttpException('sql error');
        }
        $dataProvider = new \yii\data\ArrayDataProvider([
            //'key' => 'hoscode',
            'allModels' => $rawData,
            'pagination' => TRUE,
            'pagination' => [
                'pageSize' => 6,
            ],
        ]);


        return $this->render('report3', [
                    'dataProvider' => $dataProvider,
                    'rawData' => $rawData,
                    'sql' => $sql,
        ]);
    }

    public function actionReport4() {

        $sql = ' SELECT person_education_professional,COUNT(person_education_professional) AS total FROM person
                    WHERE person_status_now = "1" AND person_education_professional <>""
                    GROUP BY person_education_professional
                    ORDER BY total DESC ';

        try {
            $rawData = \Yii::$app->db->createCommand($sql)->queryAll();
        } catch (\yii\db\Exception $e) {
            throw new \yii\web\ConflictHttpException('sql error');
        }
        $dataProvider = new \yii\data\ArrayDataProvider([
            //'key' => 'hoscode',
            'allModels' => $rawData,
            'pagination' => TRUE,
            'pagination' => [
                'pageSize' => 6,
            ],
        ]);


        return $this->render('report4', [
                    'dataProvider' => $dataProvider,
                    'rawData' => $rawData,
                    'sql' => $sql,
        ]);
    }

}
