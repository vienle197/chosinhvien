<?php

namespace common\models\db;

use Yii;

/**
 * This is the model class for table "order_items".
 *
 * @property int $id
 * @property string $itemCategoryId
 * @property string $sku mã sản phẩm store
 * @property string $link link sản phẩm trên hệ thống
 * @property string $Name
 * @property int $quantity
 * @property int $maxQuantity
 * @property double $weight
 * @property string $note
 * @property string $specifics
 * @property string $description
 * @property string $image
 * @property int $orderId
 * @property string $ParentSku
 * @property int $ProductId Khi khách hàng mua sản phẩm -> lưu trữ ở bảng product
 * @property string $OrderItemTotal Tong gia gia tri don hang
 * @property string $OrderItemTotalDisplay
 * @property int $CustomerId
 * @property int $Type
 * @property int $remove
 * @property string $ShippingStatus
 *
 * @property Orders $order
 */
class OrderItems extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'order_items';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['quantity', 'maxQuantity', 'orderId', 'ProductId', 'CustomerId', 'Type', 'remove'], 'integer'],
            [['weight', 'OrderItemTotal', 'OrderItemTotalDisplay'], 'number'],
            [['specifics', 'image'], 'string'],
            [['itemCategoryId'], 'string', 'max' => 30],
            [['sku', 'ParentSku'], 'string', 'max' => 50],
            [['link', 'Name'], 'string', 'max' => 500],
            [['note', 'description', 'ShippingStatus'], 'string', 'max' => 255],
            [['orderId'], 'exist', 'skipOnError' => true, 'targetClass' => Orders::className(), 'targetAttribute' => ['orderId' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'itemCategoryId' => 'Item Category ID',
            'sku' => 'Sku',
            'link' => 'Link',
            'Name' => 'Name',
            'quantity' => 'Quantity',
            'maxQuantity' => 'Max Quantity',
            'weight' => 'Weight',
            'note' => 'Note',
            'specifics' => 'Specifics',
            'description' => 'Description',
            'image' => 'Image',
            'orderId' => 'Order ID',
            'ParentSku' => 'Parent Sku',
            'ProductId' => 'Product ID',
            'OrderItemTotal' => 'Order Item Total',
            'OrderItemTotalDisplay' => 'Order Item Total Display',
            'CustomerId' => 'Customer ID',
            'Type' => 'Type',
            'remove' => 'Remove',
            'ShippingStatus' => 'Shipping Status',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrder()
    {
        return $this->hasOne(Orders::className(), ['id' => 'orderId']);
    }
}
