<?php

namespace common\models\db;

use Yii;

/**
 * This is the model class for table "variation".
 *
 * @property int $id
 * @property string $key
 * @property string $value
 * @property int $active
 *
 * @property VariationProduct[] $variationProducts
 */
class Variation extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'variation';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['active'], 'integer'],
            [['key', 'value'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'key' => 'Key',
            'value' => 'Value',
            'active' => 'Active',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVariationProducts()
    {
        return $this->hasMany(VariationProduct::className(), ['variation_id' => 'id']);
    }
}
