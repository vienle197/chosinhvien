<?php

namespace common\models\db;

use Yii;

/**
 * This is the model class for table "product".
 *
 * @property int $id
 * @property string $name
 * @property string $sku
 * @property int $category_id
 * @property string $parent_sku
 * @property int $manufacturer_id id nhà sản xuất
 * @property int $merchant_id id người bán
 * @property int $stock_quantity Số lượng hàng có thể mua
 * @property int $sold_quantity Số lượng hàng đã bán
 * @property int $min_quantity Số lượng tối thiểu trong 1đơn
 * @property int $max_quantity Số lượng tối đa trong 1đơn
 * @property int $disable_buy_now tắt nút mua
 * @property int $disable_add_to_card tắt nút cho vào giỏ
 * @property int $is_pre_order cho phép đặt hàng trước
 * @property string $price giá gốc 1 sản phẩm
 * @property string $sale_price giá gốc đã giảm
 * @property int $expired_time_sale_price Thời gian hết hạn sale
 * @property int $active
 * @property string $meta_keywords
 * @property string $meta_description
 * @property string $meta_title
 * @property string $image
 * @property string $sale_percent
 * @property string $description
 *
 * @property Cart[] $carts
 * @property OrderItem[] $orderItems
 * @property Category $category
 * @property Manufacturer $manufacturer
 * @property Merchant $merchant
 * @property VariationProduct[] $variationProducts
 */
class Product extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'product';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'sku', 'stock_quantity', 'sold_quantity', 'price', 'active', 'image', 'description'], 'required'],
            [['category_id', 'manufacturer_id', 'merchant_id', 'stock_quantity', 'sold_quantity', 'min_quantity', 'max_quantity', 'disable_buy_now', 'disable_add_to_card', 'is_pre_order', 'expired_time_sale_price', 'active'], 'integer'],
            [['price', 'sale_price', 'sale_percent'], 'number'],
            [['description'], 'string'],
            [['name', 'sku', 'parent_sku', 'meta_keywords', 'meta_description', 'meta_title'], 'string', 'max' => 255],
            [['image'], 'string', 'max' => 500],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => Category::className(), 'targetAttribute' => ['category_id' => 'id']],
            [['manufacturer_id'], 'exist', 'skipOnError' => true, 'targetClass' => Manufacturer::className(), 'targetAttribute' => ['manufacturer_id' => 'id']],
            [['merchant_id'], 'exist', 'skipOnError' => true, 'targetClass' => Merchant::className(), 'targetAttribute' => ['merchant_id' => 'id']],
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
            'sku' => 'Sku',
            'category_id' => 'Category ID',
            'parent_sku' => 'Parent Sku',
            'manufacturer_id' => 'Manufacturer ID',
            'merchant_id' => 'Merchant ID',
            'stock_quantity' => 'Stock Quantity',
            'sold_quantity' => 'Sold Quantity',
            'min_quantity' => 'Min Quantity',
            'max_quantity' => 'Max Quantity',
            'disable_buy_now' => 'Disable Buy Now',
            'disable_add_to_card' => 'Disable Add To Card',
            'is_pre_order' => 'Is Pre Order',
            'price' => 'Price',
            'sale_price' => 'Sale Price',
            'expired_time_sale_price' => 'Expired Time Sale Price',
            'active' => 'Active',
            'meta_keywords' => 'Meta Keywords',
            'meta_description' => 'Meta Description',
            'meta_title' => 'Meta Title',
            'image' => 'Image',
            'sale_percent' => 'Sale Percent',
            'description' => 'Description',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCarts()
    {
        return $this->hasMany(Cart::className(), ['product_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrderItems()
    {
        return $this->hasMany(OrderItem::className(), ['product_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Category::className(), ['id' => 'category_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getManufacturer()
    {
        return $this->hasOne(Manufacturer::className(), ['id' => 'manufacturer_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMerchant()
    {
        return $this->hasOne(Merchant::className(), ['id' => 'merchant_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVariationProducts()
    {
        return $this->hasMany(VariationProduct::className(), ['product_id' => 'id']);
    }
}
