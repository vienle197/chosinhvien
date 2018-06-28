<?php

namespace common\models\db;

use Yii;

/**
 * This is the model class for table "categories".
 *
 * @property int $id
 * @property string $name
 * @property string $originName
 * @property string $parentId
 * @property string $description
 * @property int $active
 * @property string $MetaKeywords Những từ khóa của nhóm sản phẩm hiện thị trong thẻ meta
 * @property string $MetaDescription Những mô tả nhóm sản phẩm được hiện thị trong thẻ meta
 * @property string $MetaTitle Tiêu đề sẽ được hiện thị trên header trình duyệt
 */
class Categories extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'categories';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['description', 'MetaDescription'], 'string'],
            [['active'], 'integer'],
            [['name', 'originName'], 'string', 'max' => 220],
            [['parentId'], 'string', 'max' => 25],
            [['MetaKeywords', 'MetaTitle'], 'string', 'max' => 255],
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
            'originName' => 'Origin Name',
            'parentId' => 'Parent ID',
            'description' => 'Description',
            'active' => 'Active',
            'MetaKeywords' => 'Meta Keywords',
            'MetaDescription' => 'Meta Description',
            'MetaTitle' => 'Meta Title',
        ];
    }
}
