<?php

namespace common\models\db;

use Yii;

/**
 * This is the model class for table "manufacturer".
 *
 * @property int $id
 * @property string $ManufacturerName
 * @property string $Note
 * @property int $active
 *
 * @property Products[] $products
 */
class Manufacturer extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'manufacturer';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ManufacturerName'], 'required'],
            [['active'], 'integer'],
            [['ManufacturerName', 'Note'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'ManufacturerName' => 'Manufacturer Name',
            'Note' => 'Note',
            'active' => 'Active',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProducts()
    {
        return $this->hasMany(Products::className(), ['ManufacturerId' => 'id']);
    }
}
