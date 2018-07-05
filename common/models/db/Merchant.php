<?php

namespace common\models\db;

use Yii;

/**
 * This is the model class for table "merchant".
 *
 * @property int $id
 * @property string $MerchantName
 * @property string $note
 * @property int $active
 *
 * @property Products[] $products
 */
class Merchant extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'merchant';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['MerchantName'], 'required'],
            [['active'], 'integer'],
            [['MerchantName', 'note'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'MerchantName' => 'Merchant Name',
            'note' => 'Note',
            'active' => 'Active',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProducts()
    {
        return $this->hasMany(Products::className(), ['MerchantId' => 'id']);
    }
}
