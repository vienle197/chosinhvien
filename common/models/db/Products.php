<?php

namespace common\models\db;

use Yii;

/**
 * This is the model class for table "products".
 *
 * @property int $id
 * @property string $Sku
 * @property int $CategoryId
 * @property int $ManufacturerId Hãng sản xuất
 * @property int $MerchantId Người bán
 * @property string $MetaKeywords
 * @property string $MetaDescription
 * @property string $MetaTitle
 * @property int $StockQuantity Tổng sản phẩm
 * @property int $AvailableStockQuantity Sản phẩm còn có thể bán
 * @property int $OrderMinimumQuantity Số lượng sp tối thiểu trên 1 đơn hàng
 * @property int $OrderMaximumQuantity Số lượng sp tối đa trên 1 đơn hàng
 * @property int $DisableBuyButton Tắt nút Buy
 * @property int $AvailableForPreOrder Cho phép đặt hàng trước
 * @property string $Price Giá tính cho bán
 * @property string $SalePrice Giá đã giảm
 * @property string $DateEndSale Thời gian kết thúc bán giá Sale
 * @property int $Deleted
 * @property string $CreatedTime
 * @property string $UpdatedTime
 * @property string $Description
 *
 * @property Categories $category
 * @property Manufacturer $manufacturer
 * @property Merchant $merchant
 */
class Products extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'products';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['CategoryId', 'ManufacturerId', 'MerchantId', 'StockQuantity', 'AvailableStockQuantity', 'OrderMinimumQuantity', 'OrderMaximumQuantity', 'DisableBuyButton', 'AvailableForPreOrder', 'Deleted'], 'integer'],
            [['Price', 'SalePrice'], 'number'],
            [['DateEndSale', 'CreatedTime', 'UpdatedTime'], 'safe'],
            [['Description'], 'string'],
            [['Sku'], 'string', 'max' => 400],
            [['MetaKeywords', 'MetaDescription', 'MetaTitle'], 'string', 'max' => 255],
            [['CategoryId'], 'exist', 'skipOnError' => true, 'targetClass' => Categories::className(), 'targetAttribute' => ['CategoryId' => 'id']],
            [['ManufacturerId'], 'exist', 'skipOnError' => true, 'targetClass' => Manufacturer::className(), 'targetAttribute' => ['ManufacturerId' => 'id']],
            [['MerchantId'], 'exist', 'skipOnError' => true, 'targetClass' => Merchant::className(), 'targetAttribute' => ['MerchantId' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'Sku' => 'Sku',
            'CategoryId' => 'Category ID',
            'ManufacturerId' => 'Manufacturer ID',
            'MerchantId' => 'Merchant ID',
            'MetaKeywords' => 'Meta Keywords',
            'MetaDescription' => 'Meta Description',
            'MetaTitle' => 'Meta Title',
            'StockQuantity' => 'Stock Quantity',
            'AvailableStockQuantity' => 'Available Stock Quantity',
            'OrderMinimumQuantity' => 'Order Minimum Quantity',
            'OrderMaximumQuantity' => 'Order Maximum Quantity',
            'DisableBuyButton' => 'Disable Buy Button',
            'AvailableForPreOrder' => 'Available For Pre Order',
            'Price' => 'Price',
            'SalePrice' => 'Sale Price',
            'DateEndSale' => 'Date End Sale',
            'Deleted' => 'Deleted',
            'CreatedTime' => 'Created Time',
            'UpdatedTime' => 'Updated Time',
            'Description' => 'Description',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Categories::className(), ['id' => 'CategoryId']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getManufacturer()
    {
        return $this->hasOne(Manufacturer::className(), ['id' => 'ManufacturerId']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMerchant()
    {
        return $this->hasOne(Merchant::className(), ['id' => 'MerchantId']);
    }
}