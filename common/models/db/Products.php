<?php

namespace common\models\db;

use Yii;

/**
 * This is the model class for table "products".
 *
 * @property int $id Id
 * @property string $Sku Mã Sản Phẩm
 * @property string $ProductName Tên Sản Phẩm
 * @property int $CategoryId ID Danh Mục
 * @property string $ParentSKU Mã sản phẩm cha
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
 * @property int $Deleted Đánh dấu xóa
 * @property string $CreatedTime Ngày Tạo
 * @property string $UpdatedTime Ngày cập nhật
 * @property string $Description Chi Tiết Sản Phẩm
 * @property string $OptionVariations
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
            [['Sku', 'ProductName', 'SalePrice'], 'required'],
            [['CategoryId', 'ManufacturerId', 'MerchantId', 'StockQuantity', 'AvailableStockQuantity', 'OrderMinimumQuantity', 'OrderMaximumQuantity', 'DisableBuyButton', 'AvailableForPreOrder', 'Deleted'], 'integer'],
            [['Price', 'SalePrice'], 'number'],
            [['DateEndSale', 'CreatedTime', 'UpdatedTime'], 'safe'],
            [['Description', 'OptionVariations'], 'string'],
            [['Sku'], 'string', 'max' => 400],
            [['ProductName', 'ParentSKU', 'MetaKeywords', 'MetaDescription', 'MetaTitle'], 'string', 'max' => 255],
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
            'id' => 'Id',
            'Sku' => 'Mã Sản Phẩm',
            'ProductName' => 'Tên Sản Phẩm',
            'CategoryId' => 'ID Danh Mục',
            'ParentSKU' => 'Mã sản phẩm cha',
            'ManufacturerId' => 'Hãng sản xuất',
            'MerchantId' => 'Người bán',
            'MetaKeywords' => 'Meta Keywords',
            'MetaDescription' => 'Meta Description',
            'MetaTitle' => 'Meta Title',
            'StockQuantity' => 'Tổng sản phẩm',
            'AvailableStockQuantity' => 'Sản phẩm còn có thể bán',
            'OrderMinimumQuantity' => 'Số lượng sp tối thiểu trên 1 đơn hàng',
            'OrderMaximumQuantity' => 'Số lượng sp tối đa trên 1 đơn hàng',
            'DisableBuyButton' => 'Tắt nút Buy',
            'AvailableForPreOrder' => 'Cho phép đặt hàng trước',
            'Price' => 'Giá tính cho bán',
            'SalePrice' => 'Giá đã giảm',
            'DateEndSale' => 'Thời gian kết thúc bán giá Sale',
            'Deleted' => 'Đánh dấu xóa',
            'CreatedTime' => 'Ngày Tạo',
            'UpdatedTime' => 'Ngày cập nhật',
            'Description' => 'Chi Tiết Sản Phẩm',
            'OptionVariations' => 'Option Variations',
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
