<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\db\Order;

/**
 * OrderSearch represents the model behind the search form of `common\models\db\Order`.
 */
class OrderSearch extends Order
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'customer_id', 'promotion_id', 'created_at', 'updated_at', 'supported_by', 'ward_id', 'district_id', 'city_id', 'active'], 'integer'],
            [['first_name', 'last_name', 'email', 'phone', 'address', 'payment_method', 'note', 'status'], 'safe'],
            [['total_amount', 'final_total_amount', 'total_price_amount', 'total_fee_amount'], 'number'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
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
    public function search($params)
    {
        $query = Order::find();

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
            'customer_id' => $this->customer_id,
            'promotion_id' => $this->promotion_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'supported_by' => $this->supported_by,
            'ward_id' => $this->ward_id,
            'district_id' => $this->district_id,
            'city_id' => $this->city_id,
            'total_amount' => $this->total_amount,
            'final_total_amount' => $this->final_total_amount,
            'total_price_amount' => $this->total_price_amount,
            'total_fee_amount' => $this->total_fee_amount,
            'active' => $this->active,
        ]);

        $query->andFilterWhere(['like', 'first_name', $this->first_name])
            ->andFilterWhere(['like', 'last_name', $this->last_name])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'phone', $this->phone])
            ->andFilterWhere(['like', 'address', $this->address])
            ->andFilterWhere(['like', 'payment_method', $this->payment_method])
            ->andFilterWhere(['like', 'note', $this->note])
            ->andFilterWhere(['like', 'status', $this->status]);

        return $dataProvider;
    }
}
