<?php

namespace common\models\db;

use Yii;

/**
 * This is the model class for table "image".
 *
 * @property int $id
 * @property string $url
 * @property int $product_id
 * @property int $category_id
 * @property int $customer_id
 * @property int $created_at
 * @property int $updated_at
 * @property int $active
 * @property int $post_id
 * @property string $type
 * @property string $link_page
 * @property string $title
 * @property string $description
 */
class Image extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'image';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['product_id', 'category_id', 'customer_id', 'created_at', 'updated_at', 'active', 'post_id'], 'integer'],
            [['url', 'type', 'link_page', 'title', 'description'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'url' => 'Url',
            'product_id' => 'Product ID',
            'category_id' => 'Category ID',
            'customer_id' => 'Customer ID',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'active' => 'Active',
            'post_id' => 'Post ID',
            'type' => 'Type',
            'link_page' => 'Link Page',
            'title' => 'Title',
            'description' => 'Description',
        ];
    }
}
