<?php

namespace common\models\db;

use Yii;

/**
 * This is the model class for table "images".
 *
 * @property int $id
 * @property string $url
 * @property int $productId
 * @property int $categoryId
 * @property int $blockId
 */
class Images extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'images';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['url'], 'required'],
            [['url'], 'string'],
            [['productId', 'categoryId', 'blockId'], 'integer'],
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
            'productId' => 'Product ID',
            'categoryId' => 'Category ID',
            'blockId' => 'Block ID',
        ];
    }
}
