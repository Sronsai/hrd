<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Leave;

/**
 * LeaveSearch represents the model behind the search form about `frontend\models\Leave`.
 */
class LeaveSearch extends Leave {

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['id', 'person_id', 'leave_total'], 'integer'],
            [['leave_year', 'leave_type', 'leave_start', 'leave_end', 'leave_address', 'leave_cause', 'leave_assign'], 'safe'],
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
        $query = Leave::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'person_id' => $this->person_id,
            'leave_start' => $this->leave_start,
            'leave_end' => $this->leave_end,
            'leave_total' => $this->leave_total,
        ]);

        $query->andFilterWhere(['like', 'leave_year', $this->leave_year])
                ->andFilterWhere(['like', 'leave_type', $this->leave_type])
                ->andFilterWhere(['like', 'leave_address', $this->leave_address])
                ->andFilterWhere(['like', 'leave_cause', $this->leave_cause])
                ->andFilterWhere(['like', 'leave_assign', $this->leave_assign]);

        return $dataProvider;
    }

}
