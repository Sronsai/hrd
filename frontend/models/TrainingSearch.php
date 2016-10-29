<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Training;

/**
 * TrainingSearch represents the model behind the search form about `frontend\models\Training`.
 */
class TrainingSearch extends Training {

    public $fullName;
    public $person;
    public $fullNames;

    public function rules() {
        return [
            [['id', 'person_id', 'training_budget'/* ,'fullName' */], 'integer'],
            [
                ['training_year', 'training_course', 'training_location', 'training_start',
                    'training_end', 'training_book_number', 'training_type', 'training_budget',
                    'training_type', 'training_total', 'training_unit', 'training_department',
                    'training_actions', 'training_expectations', 'training_join', 'person', 'fullNames'
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

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params) {

        $query = Training::find();

        $query->joinWith(['person']);
        /* $query->joinWith(['person']); */

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $dataProvider->sort->attributes['fullNames'] = [
            'asc' => ['training_join' => SORT_ASC, 'training_join' => SORT_ASC],
            'desc' => ['training_join' => SORT_DESC, 'training_join' => SORT_DESC],
            'default' => SORT_ASC
        ];

        $query->andWhere('training_join LIKE "%' . $this->fullNames . '%" ' .
                'OR training_join LIKE "%' . $this->fullNames . '%"'
        );

        $query->andFilterWhere(['like', 'training_join', $this->training_join]);


        $dataProvider->sort->attributes['person'] = [
            // The tables are the ones our relation are configured to
            // in my case they are prefixed with "tbl_"
            'asc' => ['person_fullname' => SORT_ASC],
            'desc' => ['person_fullname' => SORT_DESC],
        ];

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'training_start' => $this->training_start,
            'training_end' => $this->training_end,
            'person_id' => $this->person_id,
            'training_book_number' => $this->training_book_number,
            'training_type' => $this->training_type,
            'training_total' => $this->training_total,
            'training_unit' => $this->training_unit,
            'training_course' => $this->training_course,
            'training_location' => $this->training_location,
            'training_department' => $this->training_department,
            'training_actions' => $this->training_actions,
            'training_expectations' => $this->training_expectations,
            'training_join' => $this->training_join,
        ]);

        $query->andFilterWhere(['like', 'training_year', $this->training_year])
                ->andFilterWhere(['like', 'training_budget', $this->training_budget])
                ->andFilterWhere(['like', 'training_book_number', $this->training_book_number])
                ->andFilterWhere(['like', 'training_type', $this->training_type])
                ->andFilterWhere(['like', 'training_total', $this->training_total])
                ->andFilterWhere(['like', 'training_unit', $this->training_unit])
                ->andFilterWhere(['like', 'training_course', $this->training_course])
                ->andFilterWhere(['like', 'training_location', $this->training_location])
                ->andFilterWhere(['like', 'training_department', $this->training_department])
                ->andFilterWhere(['like', 'training_actions', $this->training_actions])
                ->andFilterWhere(['like', 'training_join', $this->training_join])
                ->andFilterWhere(['like', 'training_expectations', $this->training_expectations]);

        $query->andFilterWhere(['like', 'person_fullname', $this->person]);

        /* $query->orFilterWhere(['like', 'person.person_fname', $this->fullName])
          ->orFilterWhere(['like', 'person_.person_lname', $this->fullName]); */

        return $dataProvider;
    }

}
