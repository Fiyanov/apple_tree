<?php
/**
 * Created by PhpStorm.
 * User: IF
 * Date: 02.01.2020
 * Time: 13:22
 */

namespace common\models\search;

use yii\data\ActiveDataProvider;
use common\models\Apples;

class ApplesSearch extends Apples
{
    public function search($params)
    {
        $query = Apples::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'color' => $this->color,
            'status' => $this->status,
            'create_date' => $this->create_date,
            'fall_date' => $this->fall_date,
            'size' => $this->size,
        ]);

        return $dataProvider;
    }
}