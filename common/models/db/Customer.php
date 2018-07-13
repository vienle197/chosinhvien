<?php

namespace common\models\db;

use Yii;

/**
 * This is the model class for table "customer".
 *
 * @property int $id
 * @property string $username
 * @property string $password_hash
 * @property string $email
 * @property string $fullname
 * @property string $avatar
 * @property string $addres
 * @property string $auth_key
 * @property string $password_reset_token
 * @property int $status
 * @property string $created_at
 * @property string $updated_at
 * @property string $phone
 * @property int $gender
 * @property string $birthday
 * @property string $address
 * @property int $Deleted Đã xóa hay chưa?
 * @property int $CityId
 * @property int $DistrictId
 * @property int $active
 * @property int $WardId
 *
 * @property Cities $city
 * @property Districts $district
 * @property Wards $ward
 * @property OrderItems[] $orderItems
 * @property Orders[] $orders
 */
class Customer extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'customer';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['status', 'gender', 'Deleted', 'CityId', 'DistrictId', 'active', 'WardId'], 'integer'],
            [['created_at', 'updated_at', 'birthday'], 'safe'],
            [['username', 'email', 'fullname', 'auth_key'], 'string', 'max' => 200],
            [['password_hash', 'avatar', 'addres', 'password_reset_token'], 'string', 'max' => 255],
            [['phone'], 'string', 'max' => 50],
            [['address'], 'string', 'max' => 500],
            [['CityId'], 'exist', 'skipOnError' => true, 'targetClass' => Cities::className(), 'targetAttribute' => ['CityId' => 'id']],
            [['DistrictId'], 'exist', 'skipOnError' => true, 'targetClass' => Districts::className(), 'targetAttribute' => ['DistrictId' => 'id']],
            [['WardId'], 'exist', 'skipOnError' => true, 'targetClass' => Wards::className(), 'targetAttribute' => ['WardId' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'password_hash' => 'Password Hash',
            'email' => 'Email',
            'fullname' => 'Fullname',
            'avatar' => 'Avatar',
            'addres' => 'Addres',
            'auth_key' => 'Auth Key',
            'password_reset_token' => 'Password Reset Token',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'phone' => 'Phone',
            'gender' => 'Gender',
            'birthday' => 'Birthday',
            'address' => 'Address',
            'Deleted' => 'Đã xóa hay chưa?',
            'CityId' => 'City ID',
            'DistrictId' => 'District ID',
            'active' => 'Active',
            'WardId' => 'Ward ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCity()
    {
        return $this->hasOne(Cities::className(), ['id' => 'CityId']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDistrict()
    {
        return $this->hasOne(Districts::className(), ['id' => 'DistrictId']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWard()
    {
        return $this->hasOne(Wards::className(), ['id' => 'WardId']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrderItems()
    {
        return $this->hasMany(OrderItems::className(), ['CustomerId' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrders()
    {
        return $this->hasMany(Orders::className(), ['CustomerId' => 'id']);
    }
}
