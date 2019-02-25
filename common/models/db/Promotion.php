<?php

namespace common\models\db;

use Yii;

/**
 * This is the model class for table "promotion".
 *
 * @property int $id
 * @property string $name
 * @property string $code
 * @property string $description
 * @property int $active
 * @property int $created_at
 * @property int $updated_at
 * @property int $created_by
 * @property int $updated_by
 * @property string $meta_keywords
 * @property string $meta_description
 * @property string $meta_title
 * @property string $type REFUND, COUPON, PROMOTION
 * @property string $for_email cho email nào
 * @property string $for_categories
 * @property string $for_products
 * @property string $min_price_access giá thấp nhất đc áp dụng
 * @property string $max_price_access giá cao nhất được áp dụng
 * @property string $min_price số tiền nhỏ nhất được giảm
 * @property string $max_price số tiền lớn nhất được giảm
 * @property int $expired_time
 * @property int $max_order số lượng đơn tối đa có thể áp dụng
 * @property int $count_order số lượng đơn đã áp dụng
 * @property int $count_order_customer số lượng tối đa cho 1 customer
 *
 * @property Order[] $orders
 * @property User $createdBy
 * @property User $updatedBy
 */
class Promotion extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'promotion';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['active', 'created_at', 'updated_at', 'created_by', 'updated_by', 'expired_time', 'max_order', 'count_order', 'count_order_customer'], 'integer'],
            [['min_price_access', 'max_price_access', 'min_price', 'max_price'], 'number'],
            [['name', 'code', 'description', 'meta_keywords', 'meta_description', 'meta_title', 'type', 'for_email', 'for_categories', 'for_products'], 'string', 'max' => 255],
            [['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['created_by' => 'id']],
            [['updated_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['updated_by' => 'id']],
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
            'description' => 'Description',
            'active' => 'Active',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
            'meta_keywords' => 'Meta Keywords',
            'meta_description' => 'Meta Description',
            'meta_title' => 'Meta Title',
            'type' => 'REFUND, COUPON, PROMOTION',
            'for_email' => 'cho email nào',
            'for_categories' => 'For Categories',
            'for_products' => 'For Products',
            'min_price_access' => 'giá thấp nhất đc áp dụng',
            'max_price_access' => 'giá cao nhất được áp dụng',
            'min_price' => 'số tiền nhỏ nhất được giảm',
            'max_price' => 'số tiền lớn nhất được giảm',
            'expired_time' => 'Expired Time',
            'max_order' => 'số lượng đơn tối đa có thể áp dụng',
            'count_order' => 'số lượng đơn đã áp dụng',
            'count_order_customer' => 'số lượng tối đa cho 1 customer',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrders()
    {
        return $this->hasMany(Order::className(), ['promotion_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCreatedBy()
    {
        return $this->hasOne(User::className(), ['id' => 'created_by']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUpdatedBy()
    {
        return $this->hasOne(User::className(), ['id' => 'updated_by']);
    }
}
