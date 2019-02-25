<?php

namespace common\models\db;

use Yii;

/**
 * This is the model class for table "system_wards".
 *
 * @property int $id
 * @property string $wards_name
 * @property int $district_id
 * @property int $city_id
 * @property string $note
 *
 * @property SystemCity $city
 * @property SystemDistrict $district
 */
class SystemWards extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'system_wards';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['district_id', 'city_id'], 'integer'],
            [['wards_name', 'note'], 'string', 'max' => 255],
            [['city_id'], 'exist', 'skipOnError' => true, 'targetClass' => SystemCity::className(), 'targetAttribute' => ['city_id' => 'id']],
            [['district_id'], 'exist', 'skipOnError' => true, 'targetClass' => SystemDistrict::className(), 'targetAttribute' => ['district_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'wards_name' => 'Wards Name',
            'district_id' => 'District ID',
            'city_id' => 'City ID',
            'note' => 'Note',
        ];
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
}
