<?php

namespace common\models\db;

use Yii;

/**
 * This is the model class for table "address".
 *
 * @property int $id
 * @property int $customer_id
 * @property string $first_name
 * @property string $last_name
 * @property string $email
 * @property int $ward_id
 * @property int $district_id
 * @property int $city_id
 * @property string $phone
 * @property string $address
 * @property int $is_default
 * @property int $status
 * @property string $created_at
 * @property string $updated_at
 *
 * @property Customer $customer
 * @property SystemCity $city
 * @property SystemDistrict $district
 * @property SystemWards $ward
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
            [['customer_id', 'ward_id', 'district_id', 'city_id', 'is_default', 'status'], 'integer'],
            [['first_name', 'last_name', 'email', 'phone', 'address', 'created_at', 'updated_at'], 'required'],
            [['created_at', 'updated_at'], 'safe'],
            [['first_name', 'last_name', 'email', 'phone', 'address'], 'string', 'max' => 255],
            [['customer_id'], 'exist', 'skipOnError' => true, 'targetClass' => Customer::className(), 'targetAttribute' => ['customer_id' => 'id']],
            [['city_id'], 'exist', 'skipOnError' => true, 'targetClass' => SystemCity::className(), 'targetAttribute' => ['city_id' => 'id']],
            [['district_id'], 'exist', 'skipOnError' => true, 'targetClass' => SystemDistrict::className(), 'targetAttribute' => ['district_id' => 'id']],
            [['ward_id'], 'exist', 'skipOnError' => true, 'targetClass' => SystemWards::className(), 'targetAttribute' => ['ward_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'customer_id' => 'Customer ID',
            'first_name' => 'First Name',
            'last_name' => 'Last Name',
            'email' => 'Email',
            'ward_id' => 'Ward ID',
            'district_id' => 'District ID',
            'city_id' => 'City ID',
            'phone' => 'Phone',
            'address' => 'Address',
            'is_default' => 'Is Default',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCustomer()
    {
        return $this->hasOne(Customer::className(), ['id' => 'customer_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCity()
    {
        return $this->hasOne(SystemCity::className(), ['id' => 'city_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDistrict()
    {
        return $this->hasOne(SystemDistrict::className(), ['id' => 'district_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWard()
    {
        return $this->hasOne(SystemWards::className(), ['id' => 'ward_id']);
    }
}
