<?php

namespace common\models\db;

use Yii;

/**
 * This is the model class for table "address".
 *
 * @property int $id
 * @property int $CustomerId id Khách 
 * @property string $buyerEmail Email người mua
 * @property string $buyerName Tên người mua
 * @property string $buyerPhone
 * @property string $buyerAddress
 * @property int $buyerCityId
 * @property string $buyerCityName
 * @property int $buyerDistrictId
 * @property string $buyerDisctrictName
 * @property int $buyerWardId
 * @property string $buyerWardtName
 * @property int $delete
 *
 * @property Cities $buyerCity
 * @property Districts $buyerDistrict
 * @property Wards $buyerWard
 */
class Address extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'address';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'required'],
            [['id', 'CustomerId', 'buyerCityId', 'buyerDistrictId', 'buyerWardId', 'delete'], 'integer'],
            [['buyerEmail'], 'string', 'max' => 100],
            [['buyerName', 'buyerAddress'], 'string', 'max' => 220],
            [['buyerPhone'], 'string', 'max' => 50],
            [['buyerCityName', 'buyerDisctrictName', 'buyerWardtName'], 'string', 'max' => 255],
            [['id'], 'unique'],
            [['buyerCityId'], 'exist', 'skipOnError' => true, 'targetClass' => Cities::className(), 'targetAttribute' => ['buyerCityId' => 'id']],
            [['buyerDistrictId'], 'exist', 'skipOnError' => true, 'targetClass' => Districts::className(), 'targetAttribute' => ['buyerDistrictId' => 'id']],
            [['buyerWardId'], 'exist', 'skipOnError' => true, 'targetClass' => Wards::className(), 'targetAttribute' => ['buyerWardId' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'CustomerId' => 'id Khách ',
            'buyerEmail' => 'Email người mua',
            'buyerName' => 'Tên người mua',
            'buyerPhone' => 'Buyer Phone',
            'buyerAddress' => 'Buyer Address',
            'buyerCityId' => 'Buyer City ID',
            'buyerCityName' => 'Buyer City Name',
            'buyerDistrictId' => 'Buyer District ID',
            'buyerDisctrictName' => 'Buyer Disctrict Name',
            'buyerWardId' => 'Buyer Ward ID',
            'buyerWardtName' => 'Buyer Wardt Name',
            'delete' => 'Delete',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBuyerCity()
    {
        return $this->hasOne(Cities::className(), ['id' => 'buyerCityId']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBuyerDistrict()
    {
        return $this->hasOne(Districts::className(), ['id' => 'buyerDistrictId']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBuyerWard()
    {
        return $this->hasOne(Wards::className(), ['id' => 'buyerWardId']);
    }
}
