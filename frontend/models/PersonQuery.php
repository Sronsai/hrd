<?php

namespace frontend\models;

/**
 * This is the ActiveQuery class for [[Person]].
 *
 * @see Person
 */
class PersonQuery extends \yii\db\ActiveQuery {
    /* public function active()
      {
      $this->andWhere('[[status]]=1');
      return $this;
      } */

    /**
     * @inheritdoc
     * @return Person[]|array
     */
    public function all($db = null) {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Person|array|null
     */
    public function one($db = null) {
        return parent::one($db);
    }

    public function addAge() {
        return $this->select(' TIMESTAMPDIFF(year, `person_birthday`, CURRENT_TIMESTAMP) AS `age`,person.* ');
    }

}
