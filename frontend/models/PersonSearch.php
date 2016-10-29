<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Person;
use yii\data\SqlDataProvider;

/**
 * PersonSearch represents the model behind the search form about `frontend\models\Person`.
 */
class PersonSearch extends Person {

    public $EducationName;
    public $EducationProfessional;
    public $age;
    public $birthday;

    public function rules() {
        return [
            [[
            'birthday', 'id', 'person_id', 'person_cid', 'person_status_now', 'person_department',
            'person_position', /* 'person_education', */ 'age', 'person_type', 'person_level',
            'person_potition_number', 'person_insurance', 'person_pts', 'person_cho'
                ], 'integer'],
            [[
            'birthday', 'person_province', 'person_amphur', 'person_district',
            /* 'person_province_old',  'person_amphur_old', 'person_district_old' */
            'age', 'person_pname', 'person_fullname', 'person_oname', 'person_birthday', 'person_sex',
            'person_address', 'person_address_old', 'person_status', 'person_blod', 'person_phon',
            'person_email', 'person_worked', 'person_workin', 'person_potition_number', 'person_nickname',
            'EducationName', 'EducationProfessional'
                ], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios() {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    public function search($params) {
        //$query = Person::find()->orderBy(['id' => SORT_DESC]);

        $query = Person ::find()
                ->select('age')
                ->andWhere(['person_status_now' => 1])
                ->orderBy(['age' => SORT_DESC])
                ->addAge();


        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 15,]
        ]);

        // Sorting by person_sex
        /* $dataProvider->sort->attributes['person_sex'] = [
          'asc' => ['person_sex' => SORT_ASC, 'person_sex' => SORT_ASC],
          'desc' => ['person_sex' => SORT_DESC, 'person_sex' => SORT_DESC],
          'default' => SORT_ASC
          ];

          $dataProvider->sort->attributes['person_status_now'] = [
          'asc' => ['person_status_now' => SORT_ASC, 'person_status_now' => SORT_ASC],
          'desc' => ['person_status_now' => SORT_DESC, 'person_status_now' => SORT_DESC],
          'default' => SORT_ASC
          ];

          $dataProvider->sort->attributes['person_department'] = [
          'asc' => ['person_department' => SORT_ASC, 'person_department' => SORT_ASC],
          'desc' => ['person_department' => SORT_DESC, 'person_department' => SORT_DESC],
          'default' => SORT_ASC
          ];

          $dataProvider->sort->attributes['person_position'] = [
          'asc' => ['person_position' => SORT_ASC, 'person_position' => SORT_ASC],
          'desc' => ['person_position' => SORT_DESC, 'person_position' => SORT_DESC],
          'default' => SORT_ASC
          ];

          $dataProvider->sort->attributes['person_education'] = [
          'asc' => ['person_education' => SORT_ASC, 'person_education' => SORT_ASC],
          'desc' => ['person_education' => SORT_DESC, 'person_education' => SORT_DESC],
          'default' => SORT_ASC
          ];

          $dataProvider->sort->attributes['person_type'] = [
          'asc' => ['person_type' => SORT_ASC, 'person_type' => SORT_ASC],
          'desc' => ['person_type' => SORT_DESC, 'person_type' => SORT_DESC],
          'default' => SORT_ASC
          ];

          $dataProvider->sort->attributes['EducationName'] = [
          'asc' => ['EducationName' => SORT_ASC, 'EducationName' => SORT_ASC],
          'desc' => ['EducationName' => SORT_DESC, 'EducationName' => SORT_DESC],
          'default' => SORT_ASC
          ];

          $dataProvider->sort->attributes['age'] = [
          'asc' => ['age' => SORT_ASC, 'age' => SORT_ASC],
          'desc' => ['age' => SORT_DESC, 'age' => SORT_DESC],
          'default' => SORT_ASC
          ]; */

        /* $dataProvider->sort->attributes['person_level'] = [
          'asc' => ['person_level' => SORT_ASC, 'person_level' => SORT_ASC],
          'desc' => ['person_level' => SORT_DESC, 'person_level' => SORT_DESC],
          'default' => SORT_ASC
          ]; */



        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }


        $query->andFilterWhere([
            'id' => $this->id,
            'person_id' => $this->person_id,
            'person_cid' => $this->person_cid,
            'person_birthday' => $this->person_birthday,
            'person_age' => $this->person_age,
            'person_worked' => $this->person_worked,
            'person_workin' => $this->person_workin,
            'person_sex' => $this->person_sex,
            'person_status_now' => $this->person_status_now,
            'person_department' => $this->person_department,
            'person_position' => $this->person_position,
            'person_education' => $this->person_education,
            'person_type' => $this->person_type,
            'person_province' => $this->person_province,
            'person_amphur' => $this->person_amphur,
            'person_district' => $this->person_district,
            'person_potition_number' => $this->person_district,
            'person_insurance' => $this->person_insurance,
            'person_pts' => $this->person_pts,
            'person_pts' => $this->person_cho,
            'person_education_title' => $this->person_education_title,
            'person_education_graduate' => $this->person_education_graduate,
            'person_education_professional' => $this->person_education_professional,
                //'age' => $this->age,
                //'person_level' => $this->person_level,
        ]);


        $query->andFilterWhere(['like', 'person_pname', $this->person_pname])
                ->andFilterWhere(['like', 'person_fullname', $this->person_fullname])
                ->andFilterWhere(['like', 'person_oname', $this->person_oname])
                ->andFilterWhere(['like', 'person_sex', $this->person_sex])
                ->andFilterWhere(['like', 'person_address', $this->person_address])
                ->andFilterWhere(['like', 'person_status', $this->person_status])
                ->andFilterWhere(['like', 'person_blod', $this->person_blod])
                ->andFilterWhere(['like', 'person_phon', $this->person_phon])
                ->andFilterWhere(['like', 'person_email', $this->person_email])
                ->andFilterWhere(['like', 'person_status_now', $this->person_status_now])
                ->andFilterWhere(['like', 'person_department', $this->person_department])
                ->andFilterWhere(['like', 'person_position', $this->person_position])
                ->andFilterWhere(['like', 'person_education', $this->person_education])
                ->andFilterWhere(['like', 'person_education_professional', $this->person_education_professional])
                ->andFilterWhere(['like', 'person_type', $this->person_type])
                ->andFilterWhere(['like', 'person_province', $this->person_province])
                ->andFilterWhere(['like', 'person_amphur', $this->person_amphur])
                ->andFilterWhere(['like', 'person_district', $this->person_district])
                ->andFilterWhere(['like', 'person_insurance', $this->person_insurance])
                ->andFilterWhere(['like', 'person_pts', $this->person_pts])
                ->andFilterWhere(['like', 'person_cho', $this->person_cho])
                ->andFilterWhere(['like', 'person_education_title', $this->person_education_title])
                ->andFilterWhere(['like', 'person_education_graduate', $this->person_education_graduate])
                ->andFilterWhere(['like', 'person_level', $this->person_level]);
        //->andFilterWhere(['like', 'age', $this->age]);

        return $dataProvider;
    }

}
