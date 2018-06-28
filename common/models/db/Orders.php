<?php

namespace common\models\db;

use Yii;

/**
 * This is the model class for table "orders".
 *
 * @property int $id order code
 * @property string $binCode
 * @property int $type
 * @property int $CustomerId FK bảng customer
 * @property string $buyerEmail
 * @property string $buyerName
 * @property string $buyerPhone
 * @property string $buyerAddress
 * @property int $buyerProvinceId
 * @property string $billingCityName
 * @property int $buyerDistrictId
 * @property string $billingDisctrictName
 * @property string $paymentType hinh thuc thanh toan. 
 * @property int $paymentStatus trang thai thanh toan
 * @property int $refundStatus 1: ko có, 2: 1 phần, 3: toàn bộ, 4: cancel
 * @property int $shippingStatus Trạng thái vận chuyển hàng
 * @property string $shipmentPrice Phí vận chuyển
 * @property string $createTime
 * @property string $updateTime
 * @property int $complete
 * @property string $note
 * @property string $totalPrice tong gia cua don hang 
 * @property string $finalPrice Gia thuc su khach hang phai thanh toan
 * @property int $remove
 *
 * @property OrderItems[] $orderItems
 * @property Customer $customer
 */
class Orders extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'orders';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['type', 'CustomerId', 'buyerProvinceId', 'buyerDistrictId', 'paymentStatus', 'refundStatus', 'shippingStatus', 'complete', 'remove'], 'integer'],
            [['shipmentPrice', 'totalPrice', 'finalPrice'], 'number'],
            [['createTime', 'updateTime'], 'safe'],
            [['note'], 'string'],
            [['binCode', 'buyerPhone', 'paymentType'], 'string', 'max' => 50],
            [['buyerEmail'], 'string', 'max' => 100],
            [['buyerName', 'buyerAddress'], 'string', 'max' => 220],
            [['billingCityName', 'billingDisctrictName'], 'string', 'max' => 255],
            [['CustomerId'], 'exist', 'skipOnError' => true, 'targetClass' => Customer::className(), 'targetAttribute' => ['CustomerId' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'binCode' => 'Bin Code',
            'type' => 'Type',
            'CustomerId' => 'Customer ID',
            'buyerEmail' => 'Buyer Email',
            'buyerName' => 'Buyer Name',
            'buyerPhone' => 'Buyer Phone',
            'buyerAddress' => 'Buyer Address',
            'buyerProvinceId' => 'Buyer Province ID',
            'billingCityName' => 'Billing City Name',
            'buyerDistrictId' => 'Buyer District ID',
            'billingDisctrictName' => 'Billing Disctrict Name',
            'paymentType' => 'Payment Type',
            'paymentStatus' => 'Payment Status',
            'refundStatus' => 'Refund Status',
            'shippingStatus' => 'Shipping Status',
            'shipmentPrice' => 'Shipment Price',
            'createTime' => 'Create Time',
            'updateTime' => 'Update Time',
            'complete' => 'Complete',
            'note' => 'Note',
            'totalPrice' => 'Total Price',
            'finalPrice' => 'Final Price',
            'remove' => 'Remove',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrderItems()
    {
        return $this->hasMany(OrderItems::className(), ['orderId' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCustomer()
    {
        return $this->hasOne(Customer::className(), ['id' => 'CustomerId']);
    }
}
