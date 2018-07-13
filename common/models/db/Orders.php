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
 * @property int $buyerCityId
 * @property string $buyerCityName
 * @property int $buyerDistrictId
 * @property string $buyerDisctrictName
 * @property int $buyerWardId
 * @property string $buyerWardtName
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
 * @property Cities $buyerCity
 * @property Districts $buyerDistrict
 * @property Wards $buyerWard
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
            [['type', 'CustomerId', 'buyerCityId', 'buyerDistrictId', 'buyerWardId', 'paymentStatus', 'refundStatus', 'shippingStatus', 'complete', 'remove'], 'integer'],
            [['shipmentPrice', 'totalPrice', 'finalPrice'], 'number'],
            [['createTime', 'updateTime'], 'safe'],
            [['note'], 'string'],
            [['binCode', 'buyerPhone', 'paymentType'], 'string', 'max' => 50],
            [['buyerEmail'], 'string', 'max' => 100],
            [['buyerName', 'buyerAddress'], 'string', 'max' => 220],
            [['buyerCityName', 'buyerDisctrictName', 'buyerWardtName'], 'string', 'max' => 255],
            [['CustomerId'], 'exist', 'skipOnError' => true, 'targetClass' => Customer::className(), 'targetAttribute' => ['CustomerId' => 'id']],
            [['buyerCityId'], 'exist', 'skipOnError' => true, 'targetClass' => Cities::className(), 'targetAttribute' => ['buyerCityId' => 'id']],
            [['buyerDistrictId'], 'exist', 'skipOnError' => true, 'targetClass' => Districts::className(), 'targetAttribute' => ['buyerDistrictId' => 'id']],
            [['buyerWardId'], 'exist', 'skipOnError' => true, 'targetClass' => Wards::className(), 'targetAttribute' => ['buyerWardId' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'order code',
            'binCode' => 'Bin Code',
            'type' => 'Type',
            'CustomerId' => 'FK bảng customer',
            'buyerEmail' => 'Buyer Email',
            'buyerName' => 'Buyer Name',
            'buyerPhone' => 'Buyer Phone',
            'buyerAddress' => 'Buyer Address',
            'buyerCityId' => 'Buyer City ID',
            'buyerCityName' => 'Buyer City Name',
            'buyerDistrictId' => 'Buyer District ID',
            'buyerDisctrictName' => 'Buyer Disctrict Name',
            'buyerWardId' => 'Buyer Ward ID',
            'buyerWardtName' => 'Buyer Wardt Name',
            'paymentType' => 'hinh thuc thanh toan. ',
            'paymentStatus' => 'trang thai thanh toan',
            'refundStatus' => '1: ko có, 2: 1 phần, 3: toàn bộ, 4: cancel',
            'shippingStatus' => 'Trạng thái vận chuyển hàng',
            'shipmentPrice' => 'Phí vận chuyển',
            'createTime' => 'Create Time',
            'updateTime' => 'Update Time',
            'complete' => 'Complete',
            'note' => 'Note',
            'totalPrice' => 'tong gia cua don hang ',
            'finalPrice' => 'Gia thuc su khach hang phai thanh toan',
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

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBuyerCity()
    {
        return $this->hasOne(Cities::className(), ['id' => 'buyerCityId']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBuyerDistrict()
    {
        return $this->hasOne(Districts::className(), ['id' => 'buyerDistrictId']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBuyerWard()
    {
        return $this->hasOne(Wards::className(), ['id' => 'buyerWardId']);
    }
}
