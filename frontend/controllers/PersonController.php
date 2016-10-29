<?php

namespace frontend\controllers;

use Yii;
use common\models\User;
use frontend\models\Person;
use frontend\models\PersonSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\components\AccessRule;
use frontend\models\Province;
use frontend\models\Amphur;
use frontend\models\District;
use frontend\models\ProvinceOld;
use frontend\models\AmphurOld;
use frontend\models\DistrictOld;
use frontend\models\School;
use frontend\models\SchoolSearch;
//use frontend\models\Uploads;
use yii\helpers\BaseFileHelper;
use yii\helpers\Json;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Url;
use kartik\mpdf\Pdf;
use yii\behaviors\TimestampBehavior;

class PersonController extends Controller {

    public function behaviors() {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['index', 'create', 'update', 'view', 'delete'],
                'ruleConfig' => [
                    'class' => AccessRule::className()
                ],
                'rules' => [
                    [
                        'actions' => ['index', 'create', 'view'],
                        'allow' => true,
                        'roles' => [
                            User::ROLE_USER,
                            User::ROLE_MODERATOR,
                            User::ROLE_ADMIN
                        ]
                    ],
                    [
                        'actions' => ['update'],
                        'allow' => true,
                        'roles' => [
                            User::ROLE_MODERATOR,
                            User::ROLE_ADMIN
                        ]
                    ],
                    [
                        'actions' => ['delete'],
                        'allow' => true,
                        'roles' => [User::ROLE_ADMIN]
                    ]
                ]
            ]
        ];
    }

    /**
     * Lists all Person models.
     * @return mixed
     */
    public function actionIndex() {
        $searchModel = new PersonSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Person model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id) {
        return $this->render('view', [
                    'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Person model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $model = new Person();

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $model->person_photo = $model->upload($model, 'person_photo');
            $model->save();
            //return $this->redirect(['view', 'id' => $model->id]);
            return $this->redirect(['person/index']);
        } else {
            return $this->render('create', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Person model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id) {
        $model = $this->findModel($id);
        $model->educationToArray();
        $model->educationprofessionalToArray();

        $amphur = ArrayHelper::map($this->getAmphur($model->person_province), 'id', 'name');
        $district = ArrayHelper::map($this->getDistrict($model->person_amphur), 'id', 'name');

        $amphur_old = ArrayHelper::map($this->getAmphurOld($model->person_province_old), 'id', 'name');
        $district_old = ArrayHelper::map($this->getDistrictOld($model->person_amphur_old), 'id', 'name');

        $school = ArrayHelper::map($this->getSchool($model->person_education_graduate), 'id', 'name');

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $model->person_photo = $model->upload($model, 'person_photo');
            //$model->educationToArray();
            $model->save();
            //return $this->redirect(['view', 'id' => $model->id]);
            return $this->redirect(['person/index']);
        } else {
            return $this->render('update', [
                        'model' => $model,
                        'amphur' => $amphur,
                        'district' => $district,
                        'school' => $school,
                        'amphur_old' => $amphur_old,
                        'district_old' => $district_old,
            ]);
        }
    }

    /**
     * Deletes an existing Person model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id) {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Person model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Person the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = Person::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionGetAmphur() {
        $out = [];
        if (isset($_POST['depdrop_parents'])) {
            $parents = $_POST['depdrop_parents'];
            if ($parents != null) {
                $province_id = $parents[0];
                $out = $this->getAmphur($province_id);
                echo Json::encode(['output' => $out, 'selected' => '']);
                return;
            }
        }
        echo Json::encode(['output' => '', 'selected' => '']);
    }

    public function actionGetDistrict() {
        $out = [];
        if (isset($_POST['depdrop_parents'])) {
            $ids = $_POST['depdrop_parents'];
            $province_id = empty($ids[0]) ? null : $ids[0];
            $amphur_id = empty($ids[1]) ? null : $ids[1];
            if ($province_id != null) {
                $data = $this->getDistrict($amphur_id);
                echo Json::encode(['output' => $data, 'selected' => '']);
                return;
            }
        }
        echo Json::encode(['output' => '', 'selected' => '']);
    }

    protected function getAmphur($id) {
        $datas = Amphur::find()->where(['PROVINCE_ID' => $id])->all();
        return $this->MapData($datas, 'AMPHUR_ID', 'AMPHUR_NAME');
    }

    protected function getDistrict($id) {
        $datas = District::find()->where(['AMPHUR_ID' => $id])->all();
        return $this->MapData($datas, 'DISTRICT_ID', 'DISTRICT_NAME');
    }

    protected function MapData($datas, $fieldId, $fieldName) {
        $obj = [];
        foreach ($datas as $key => $value) {
            array_push($obj, ['id' => $value->{$fieldId}, 'name' => $value->{$fieldName}]);
        }
        return $obj;
    }

    /////////////////////// ภูมิลำเนาเดิม ///////////////////

    public function actionGetDistrictOld() {
        $out = [];
        if (isset($_POST['depdrop_parents'])) {
            $ids = $_POST['depdrop_parents'];
            $province_id = empty($ids[0]) ? null : $ids[0];
            $amphur_id = empty($ids[1]) ? null : $ids[1];
            if ($province_id != null) {
                $data = $this->getDistrict($amphur_id);
                echo Json::encode(['output' => $data, 'selected' => '']);
                return;
            }
        }
        echo Json::encode(['output' => '', 'selected' => '']);
    }

    protected function getAmphurOld($id) {
        $datas = AmphurOld::find()->where(['PROVINCE_ID' => $id])->all();
        return $this->MapData($datas, 'AMPHUR_ID', 'AMPHUR_NAME');
    }

    protected function getDistrictOld($id) {
        $datas = DistrictOld::find()->where(['AMPHUR_ID' => $id])->all();
        return $this->MapData($datas, 'DISTRICT_ID', 'DISTRICT_NAME');
    }

    public function actionSchoolList($q = null, $id = null) {
        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON; //กำหนดการแสดงผลข้อมูลแบบ json 
        $out = ['results' => ['id' => '', 'text' => '']];
        //$out ['results'] = ['id' => $id, 'text' => \frontend\models\School::find($id)->school_name];
        if (!is_null($q)) {
            $query = new \yii\db\Query();
            $query->select('id, school_name AS text')
                    ->from('school')
                    ->where("school_name LIKE '%" . $q . "%'")
                    ->limit(20);
            $command = $query->createCommand();
            $data = $command->queryAll();
            $out['results'] = array_values($data);
        } else if ($id > 0) {
            $out['results'] = ['id' => $id, 'text' => \frontend\models\School::find($id)->school_name];
        }
        return $out;
    }

    protected function getSchool($id) {
        $datas = School::find()->where(['id' => $id])->all();
        return $this->MapData($datas, 'id', 'school_name');
    }
    
    
    public function actionPdffull($id) {
        $model = $this->findModel($id);
        //$model = Person::find()->select(" TIMESTAMPDIFF(year, `person_birthday`, CURRENT_TIMESTAMP) AS `age`,person.* ")->One();
        $date = date('Y-m-d');

        $content = $this->renderPartial('pdffull', [
            'date' => $date,
            'model' => $model
        ]);

        // setup kartik\mpdf\Pdf component
        $pdf = new Pdf([
            // set to use core fonts only
            'mode' => Pdf::MODE_UTF8,
            // A4 paper format
            'format' => Pdf::FORMAT_A4,
            // portrait orientation
            'orientation' => Pdf::ORIENT_PORTRAIT,
            // stream to browser inline
            'destination' => Pdf::DEST_BROWSER,
            // your html content input
            'content' => $content,
            'marginTop' => 10,
            'marginLeft' => 15,
            'marginRight' => 15,
            // format content from your own css file if needed or use the
            // enhanced bootstrap css built by Krajee for mPDF formatting
            'cssFile' => '@vendor/kartik-v/yii2-mpdf/assets/kv-mpdf-bootstrap.css',
            // any css to be embedded if required
            'cssInline' => '
            body{
                font-family:"garuda", "sans-serif";
                font-size:14px;
            }
            p{
                font-size:10px;
                line-height: 4px;
            }
                    #wrapper{

            width: 210.5mm;
            height: 150mm;
            margin: 0px;
        }
                #header{
        height: 25mm;
    }
                #header p{
    margin-bottom: 0px;
}
.row1{
    height: 50%
    margin: 0px;
}
.row2{
    height: 50%
    margin: 0px;
    background-color: yellow;
}


',
            // set mPDF properties on the fly
            'options' => [
                'title' => '',
            ],
            // call mPDF methods on the fly
            'methods' => [
            //'SetHeader' => ['รายละเอียดการประเมินปัญหาแรกรับ'],
            //'SetFooter' => ['{PAGENO}'],
            ]
        ]);

        // return the pdf output as per the destination setting
        return $pdf->render();
    }
    

    public function actionPdf($id) {
        $model = $this->findModel($id);
        //$model = Person::find()->select(" TIMESTAMPDIFF(year, `person_birthday`, CURRENT_TIMESTAMP) AS `age`,person.* ")->One();
        $date = date('Y-m-d');

        $content = $this->renderPartial('pdf', [
            'date' => $date,
            'model' => $model
        ]);

        // setup kartik\mpdf\Pdf component
        $pdf = new Pdf([
            // set to use core fonts only
            'mode' => Pdf::MODE_UTF8,
            // A4 paper format
            'format' => Pdf::FORMAT_A4,
            // portrait orientation
            'orientation' => Pdf::ORIENT_PORTRAIT,
            // stream to browser inline
            'destination' => Pdf::DEST_BROWSER,
            // your html content input
            'content' => $content,
            'marginTop' => 10,
            'marginLeft' => 15,
            'marginRight' => 15,
            // format content from your own css file if needed or use the
            // enhanced bootstrap css built by Krajee for mPDF formatting
            'cssFile' => '@vendor/kartik-v/yii2-mpdf/assets/kv-mpdf-bootstrap.css',
            // any css to be embedded if required
            'cssInline' => '
            body{
                font-family:"garuda", "sans-serif";
                font-size:14px;
            }
            p{
                font-size:10px;
                line-height: 4px;
            }
                    #wrapper{

            width: 210.5mm;
            height: 150mm;
            margin: 0px;
        }
                #header{
        height: 25mm;
    }
                #header p{
    margin-bottom: 0px;
}
.row1{
    height: 50%
    margin: 0px;
}
.row2{
    height: 50%
    margin: 0px;
    background-color: yellow;
}


',
            // set mPDF properties on the fly
            'options' => [
                'title' => '',
            ],
            // call mPDF methods on the fly
            'methods' => [
            //'SetHeader' => ['รายละเอียดการประเมินปัญหาแรกรับ'],
            //'SetFooter' => ['{PAGENO}'],
            ]
        ]);

        // return the pdf output as per the destination setting
        return $pdf->render();
    }

    public function actionPrint($id) {
        $model = $this->findModel($id);
        //$model = Person::find()->select(" TIMESTAMPDIFF(year, `person_birthday`, CURRENT_TIMESTAMP) AS `age`,person.* ")->One();
        $content = $this->renderPartial('print', [
            'model' => $model
        ]);

// setup kartik\mpdf\Pdf component 
        $pdf = new Pdf([
// set to use core fonts only 
            'mode' => Pdf::MODE_UTF8, // A4 paper format 
            'format' => [40, 20], //Pdf::FORMAT_A4, 
            'marginLeft' => false,
            'marginRight' => false,
            'marginTop' => 1,
            'marginBottom' => false,
            'marginHeader' => false,
            'marginFooter' => false,
// portrait orientation 
            'orientation' => Pdf::ORIENT_PORTRAIT,
// stream to browser inline 
            'destination' => Pdf::DEST_BROWSER,
            // your html content input 
            'content' => $content,
// format content from your own css file if needed or use the 
// enhanced bootstrap css built by Krajee for mPDF formatting 
            'cssFile' => '@frontend/web/css/kv-mpdf-bootstrap.css',
// any css to be embedded if required 
            'cssInline' => 'body{font-size:9px}',
// set mPDF properties on the fly 
            'options' => ['title' => 'Print Sticker',],
// call mPDF methods on the fly 
            'methods' => [
                'SetHeader' => false, //['Krajee Report Header'], 
                'SetFooter' => false, //['{PAGENO}'], 
            ]
        ]);
// return the pdf output as per the destination setting
        return $pdf->render();
    }

}
