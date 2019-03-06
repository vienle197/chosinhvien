<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\db\Product;

/**
 * ProductSearch represents the model behind the search form about `common\models\db\Product`.
 */
class ProductSearch extends Product
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'category_id', 'manufacturer_id', 'merchant_id', 'stock_quantity', 'sold_quantity', 'min_quantity', 'max_quantity', 'disable_buy_now', 'disable_add_to_card', 'is_pre_order', 'expired_time_sale_price', 'active'], 'integer'],
            [['name', 'sku', 'parent_sku', 'meta_keywords', 'meta_description', 'meta_title', 'image', 'description'], 'safe'],
            [['price', 'sale_price', 'sale_percent'], 'number'],
        ];
    }

    /**
     * @inheritdoc
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
        $query = Product::find();

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
            'category_id' => $this->category_id,
            'manufacturer_id' => $this->manufacturer_id,
            'merchant_id' => $this->merchant_id,
            'stock_quantity' => $this->stock_quantity,
            'sold_quantity' => $this->sold_quantity,
            'min_quantity' => $this->min_quantity,
            'max_quantity' => $this->max_quantity,
            'disable_buy_now' => $this->disable_buy_now,
            'disable_add_to_card' => $this->disable_add_to_card,
            'is_pre_order' => $this->is_pre_order,
            'price' => $this->price,
            'sale_price' => $this->sale_price,
            'expired_time_sale_price' => $this->expired_time_sale_price,
            'active' => $this->active,
            'sale_percent' => $this->sale_percent,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'sku', $this->sku])
            ->andFilterWhere(['like', 'parent_sku', $this->parent_sku])
            ->andFilterWhere(['like', 'meta_keywords', $this->meta_keywords])
            ->andFilterWhere(['like', 'meta_description', $this->meta_description])
            ->andFilterWhere(['like', 'meta_title', $this->meta_title])
            ->andFilterWhere(['like', 'image', $this->image])
            ->andFilterWhere(['like', 'description', $this->description]);

        return $dataProvider;
    }
}
