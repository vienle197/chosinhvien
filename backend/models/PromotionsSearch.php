<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\db\Promotions;

/**
 * PromotionsSearch represents the model behind the search form about `common\models\db\Promotions`.
 */
class PromotionsSearch extends Promotions
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'discountPercentage', 'createUserId', 'conditionLimitUsageCount', 'conditionLimitByCustomerUsageCount', 'usedOrderCountTotal', 'checkInstalment', 'allowMultiplePromotion'], 'integer'],
            [['name', 'code', 'message', 'discountType', 'status', 'discountCalculateType', 'refundBinCode', 'createTime', 'conditionStartTime', 'conditionEndTime', 'conditionCategoryAlias', 'conditionCustomerEmails', 'couponCode', 'usedFirstTime', 'usedLastTime', 'ListEmail', 'conditionCheckService'], 'safe'],
            [['discountAmount', 'conditionLimitUsageAmount', 'conditionLimitByCustomerUsageAmount', 'conditionOrderMaxAmount', 'conditionOrderMinAmount', 'usedDiscountAmountTotal', 'discountMaxAmount'], 'number'],
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
        $query = Promotions::find();

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
            'discountPercentage' => $this->discountPercentage,
            'discountAmount' => $this->discountAmount,
            'createTime' => $this->createTime,
            'createUserId' => $this->createUserId,
            'conditionStartTime' => $this->conditionStartTime,
            'conditionEndTime' => $this->conditionEndTime,
            'conditionLimitUsageCount' => $this->conditionLimitUsageCount,
            'conditionLimitUsageAmount' => $this->conditionLimitUsageAmount,
            'conditionLimitByCustomerUsageCount' => $this->conditionLimitByCustomerUsageCount,
            'conditionLimitByCustomerUsageAmount' => $this->conditionLimitByCustomerUsageAmount,
            'conditionOrderMaxAmount' => $this->conditionOrderMaxAmount,
            'conditionOrderMinAmount' => $this->conditionOrderMinAmount,
            'usedOrderCountTotal' => $this->usedOrderCountTotal,
            'usedDiscountAmountTotal' => $this->usedDiscountAmountTotal,
            'usedFirstTime' => $this->usedFirstTime,
            'usedLastTime' => $this->usedLastTime,
            'discountMaxAmount' => $this->discountMaxAmount,
            'checkInstalment' => $this->checkInstalment,
            'allowMultiplePromotion' => $this->allowMultiplePromotion,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'code', $this->code])
            ->andFilterWhere(['like', 'message', $this->message])
            ->andFilterWhere(['like', 'discountType', $this->discountType])
            ->andFilterWhere(['like', 'status', $this->status])
            ->andFilterWhere(['like', 'discountCalculateType', $this->discountCalculateType])
            ->andFilterWhere(['like', 'refundBinCode', $this->refundBinCode])
            ->andFilterWhere(['like', 'conditionCategoryAlias', $this->conditionCategoryAlias])
            ->andFilterWhere(['like', 'conditionCustomerEmails', $this->conditionCustomerEmails])
            ->andFilterWhere(['like', 'couponCode', $this->couponCode])
            ->andFilterWhere(['like', 'ListEmail', $this->ListEmail])
            ->andFilterWhere(['like', 'conditionCheckService', $this->conditionCheckService]);

        return $dataProvider;
    }
}
