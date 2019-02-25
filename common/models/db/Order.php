<?php

namespace common\models\db;

use Yii;

/**
 * This is the model class for table "order".
 *
 * @property int $id
 * @property int $customer_id
 * @property int $promotion_id
 * @property int $created_at
 * @property int $updated_at
 * @property int $supported_by
 * @property string $first_name
 * @property string $last_name
 * @property string $email
 * @property string $phone
 * @property string $address
 * @property int $ward_id
 * @property int $district_id
 * @property int $city_id
 * @property string $payment_method COD,ONLINE
 * @property string $note
 * @property string $status
 * @property string $total_amount
 * @property string $final_total_amount
 * @property string $total_price_amount Tổng tiền giá sản phẩm
 * @property string $total_fee_amount Tổng tiền phí sản phẩm
 * @property int $active
 *
 * @property Customer $customer
 * @property Promotion $promotion
 * @property SystemCity $city
 * @property SystemDistrict $district
 * @property SystemWards $ward
 * @property User $supportedBy
 * @property OrderItem[] $orderItems
 */
class Order extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'order';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['customer_id', 'promotion_id', 'created_at', 'updated_at', 'supported_by', 'ward_id', 'district_id', 'city_id', 'active'], 'integer'],
            [['total_amount', 'final_total_amount', 'total_price_amount', 'total_fee_amount'], 'number'],
            [['first_name', 'last_name', 'email', 'phone', 'address', 'payment_method', 'note', 'status'], 'string', 'max' => 255],
            [['customer_id'], 'exist', 'skipOnError' => true, 'targetClass' => Customer::className(), 'targetAttribute' => ['customer_id' => 'id']],
            [['promotion_id'], 'exist', 'skipOnError' => true, 'targetClass' => Promotion::className(), 'targetAttribute' => ['promotion_id' => 'id']],
            [['city_id'], 'exist', 'skipOnError' => true, 'targetClass' => SystemCity::className(), 'targetAttribute' => ['city_id' => 'id']],
            [['district_id'], 'exist', 'skipOnError' => true, 'targetClass' => SystemDistrict::className(), 'targetAttribute' => ['district_id' => 'id']],
            [['ward_id'], 'exist', 'skipOnError' => true, 'targetClass' => SystemWards::className(), 'targetAttribute' => ['ward_id' => 'id']],
            [['supported_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['supported_by' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'customer_id' => 'Customer ID',
            'promotion_id' => 'Promotion ID',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'supported_by' => 'Supported By',
            'first_name' => 'First Name',
            'last_name' => 'Last Name',
            'email' => 'Email',
            'phone' => 'Phone',
            'address' => 'Address',
            'ward_id' => 'Ward ID',
            'district_id' => 'District ID',
            'city_id' => 'City ID',
            'payment_method' => 'COD,ONLINE',
            'note' => 'Note',
            'status' => 'Status',
            'total_amount' => 'Total Amount',
            'final_total_amount' => 'Final Total Amount',
            'total_price_amount' => 'Tổng tiền giá sản phẩm',
            'total_fee_amount' => 'Tổng tiền phí sản phẩm',
            'active' => 'Active',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCustomer()
    {
        return $this->hasOne(Customer::className(), ['id' => 'customer_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPromotion()
    {
        return $this->hasOne(Promotion::className(), ['id' => 'promotion_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCity()
    {
        return $this->hasOne(SystemCity::className(), ['id' => 'city_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDistrict()
    {
        return $this->hasOne(SystemDistrict::className(), ['id' => 'district_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWard()
    {
        return $this->hasOne(SystemWards::className(), ['id' => 'ward_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSupportedBy()
    {
        return $this->hasOne(User::className(), ['id' => 'supported_by']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrderItems()
    {
        return $this->hasMany(OrderItem::className(), ['order_id' => 'id']);
    }
}
