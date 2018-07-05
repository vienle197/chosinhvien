<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\db\Products;

/**
 * ProductsSearch represents the model behind the search form about `common\models\db\Products`.
 */
class ProductsSearch extends Products
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'CategoryId', 'ManufacturerId', 'MerchantId', 'StockQuantity', 'AvailableStockQuantity', 'OrderMinimumQuantity', 'OrderMaximumQuantity'], 'integer'],
            [['Sku', 'MetaKeywords', 'MetaDescription', 'MetaTitle', 'DisableBuyButton', 'AvailableForPreOrder', 'DateEndSale', 'Deleted', 'CreatedTime', 'UpdatedTime', 'Description'], 'safe'],
            [['Price', 'SalePrice'], 'number'],
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
        $query = Products::find();

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
            'CategoryId' => $this->CategoryId,
            'ManufacturerId' => $this->ManufacturerId,
            'MerchantId' => $this->MerchantId,
            'StockQuantity' => $this->StockQuantity,
            'AvailableStockQuantity' => $this->AvailableStockQuantity,
            'OrderMinimumQuantity' => $this->OrderMinimumQuantity,
            'OrderMaximumQuantity' => $this->OrderMaximumQuantity,
            'Price' => $this->Price,
            'SalePrice' => $this->SalePrice,
            'DateEndSale' => $this->DateEndSale,
            'CreatedTime' => $this->CreatedTime,
            'UpdatedTime' => $this->UpdatedTime,
        ]);

        $query->andFilterWhere(['like', 'Sku', $this->Sku])
            ->andFilterWhere(['like', 'MetaKeywords', $this->MetaKeywords])
            ->andFilterWhere(['like', 'MetaDescription', $this->MetaDescription])
            ->andFilterWhere(['like', 'MetaTitle', $this->MetaTitle])
            ->andFilterWhere(['like', 'DisableBuyButton', $this->DisableBuyButton])
            ->andFilterWhere(['like', 'AvailableForPreOrder', $this->AvailableForPreOrder])
            ->andFilterWhere(['like', 'Deleted', $this->Deleted])
            ->andFilterWhere(['like', 'Description', $this->Description]);

        return $dataProvider;
    }
}
