<?php

namespace common\models\db;

use Yii;

/**
 * This is the model class for table "promotions".
 *
 * @property string $id
 * @property string $name
 * @property string $code
 * @property string $message
 * @property string $discountType Coupon/MultiCoupon/CouponRefund/MultiProduct/MarketingCampaign/Others
 * @property int $status 1: Active, 0: Suspend
 * @property string $discountCalculateType A1: ProductPrice, A2: US State Tax, A3: US Shipping Fee, USPrice: A1 + A2 + A3, A4: Internaltional Shipping Fee, A5: Import Tax, A6: Custome Fee, A7: LastMile Delivery, ShipFee: A4 + A7, A8: WeshopFee, A9: GST, A0: TotalAmount
 * @property int $discountPercentage %
 * @property string $discountAmount
 * @property string $refundBinCode dùng với discountType = CouponRefund
 * @property string $createTime
 * @property int $createUserId
 * @property string $conditionStartTime
 * @property string $conditionEndTime
 * @property int $conditionLimitUsageCount giới hạn số lần sử dụng
 * @property string $conditionLimitUsageAmount giới hạn số tiền sử dụng
 * @property int $conditionLimitByCustomerUsageCount giới hạn số lần sử dụng theo khách hàng
 * @property string $conditionLimitByCustomerUsageAmount giới hạn số tiền sử dụng theo khách hàng
 * @property string $conditionCategoryAlias String: các id cách nhau bởi dấu phẩy
 * @property string $conditionCustomerEmails String: các id cách nhau bởi dấu phẩy
 * @property string $conditionOrderMaxAmount giới hạn max với số tiền thanh toán của 1 đơn hàng
 * @property string $conditionOrderMinAmount giới hạn min với số tiền thanh toán của 1 đơn hàng
 * @property string $couponCode dùng với discountType = Coupon hoặc CouponRefund
 * @property int $usedOrderCountTotal
 * @property string $usedDiscountAmountTotal
 * @property string $usedFirstTime
 * @property string $usedLastTime
 * @property string $ListEmail
 * @property string $conditionCheckService Any other condition //Bank Payment....
 * @property string $discountMaxAmount
 * @property int $checkInstalment 0/ not for instalment, 1 for all
 * @property int $allowMultiplePromotion 1:true, 0: false
 */
class Promotions extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'promotions';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['status', 'discountPercentage', 'createUserId', 'conditionLimitUsageCount', 'conditionLimitByCustomerUsageCount', 'usedOrderCountTotal', 'checkInstalment', 'allowMultiplePromotion'], 'integer'],
            [['discountAmount', 'conditionLimitUsageAmount', 'conditionLimitByCustomerUsageAmount', 'conditionOrderMaxAmount', 'conditionOrderMinAmount', 'usedDiscountAmountTotal', 'discountMaxAmount'], 'number'],
            [['createTime', 'conditionStartTime', 'conditionEndTime', 'usedFirstTime', 'usedLastTime'], 'safe'],
            [['conditionCustomerEmails', 'ListEmail'], 'string'],
            [['name', 'message'], 'string', 'max' => 100],
            [['code', 'refundBinCode'], 'string', 'max' => 50],
            [['discountType', 'discountCalculateType', 'couponCode'], 'string', 'max' => 20],
            [['conditionCategoryAlias', 'conditionCheckService'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'code' => 'Code',
            'message' => 'Message',
            'discountType' => 'Discount Type',
            'status' => 'Status',
            'discountCalculateType' => 'Discount Calculate Type',
            'discountPercentage' => 'Discount Percentage',
            'discountAmount' => 'Discount Amount',
            'refundBinCode' => 'Refund Bin Code',
            'createTime' => 'Create Time',
            'createUserId' => 'Create User ID',
            'conditionStartTime' => 'Condition Start Time',
            'conditionEndTime' => 'Condition End Time',
            'conditionLimitUsageCount' => 'Condition Limit Usage Count',
            'conditionLimitUsageAmount' => 'Condition Limit Usage Amount',
            'conditionLimitByCustomerUsageCount' => 'Condition Limit By Customer Usage Count',
            'conditionLimitByCustomerUsageAmount' => 'Condition Limit By Customer Usage Amount',
            'conditionCategoryAlias' => 'Condition Category Alias',
            'conditionCustomerEmails' => 'Condition Customer Emails',
            'conditionOrderMaxAmount' => 'Condition Order Max Amount',
            'conditionOrderMinAmount' => 'Condition Order Min Amount',
            'couponCode' => 'Coupon Code',
            'usedOrderCountTotal' => 'Used Order Count Total',
            'usedDiscountAmountTotal' => 'Used Discount Amount Total',
            'usedFirstTime' => 'Used First Time',
            'usedLastTime' => 'Used Last Time',
            'ListEmail' => 'List Email',
            'conditionCheckService' => 'Condition Check Service',
            'discountMaxAmount' => 'Discount Max Amount',
            'checkInstalment' => 'Check Instalment',
            'allowMultiplePromotion' => 'Allow Multiple Promotion',
        ];
    }
}
