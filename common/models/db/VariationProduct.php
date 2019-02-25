<?php

namespace common\models\db;

use Yii;

/**
 * This is the model class for table "variation_product".
 *
 * @property int $id
 * @property string $parent_sku
 * @property int $variation_id
 * @property int $product_id
 * @property int $active
 *
 * @property Product $product
 * @property Variation $variation
 */
class VariationProduct extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'variation_product';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['variation_id', 'product_id', 'active'], 'integer'],
            [['parent_sku'], 'string', 'max' => 255],
            [['product_id'], 'exist', 'skipOnError' => true, 'targetClass' => Product::className(), 'targetAttribute' => ['product_id' => 'id']],
            [['variation_id'], 'exist', 'skipOnError' => true, 'targetClass' => Variation::className(), 'targetAttribute' => ['variation_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'parent_sku' => 'Parent Sku',
            'variation_id' => 'Variation ID',
            'product_id' => 'Product ID',
            'active' => 'Active',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProduct()
    {
        return $this->hasOne(Product::className(), ['id' => 'product_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVariation()
    {
        return $this->hasOne(Variation::className(), ['id' => 'variation_id']);
    }
}
