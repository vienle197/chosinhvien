<?php

namespace common\models\db;

use Yii;

/**
 * This is the model class for table "system_district".
 *
 * @property int $id
 * @property string $district_name
 * @property int $city_id
 * @property string $note
 *
 * @property SystemCity $city
 * @property SystemWards[] $systemWards
 */
class SystemDistrict extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'system_district';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['city_id'], 'integer'],
            [['district_name', 'note'], 'string', 'max' => 255],
            [['city_id'], 'exist', 'skipOnError' => true, 'targetClass' => SystemCity::className(), 'targetAttribute' => ['city_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'district_name' => 'District Name',
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
    public function getSystemWards()
    {
        return $this->hasMany(SystemWards::className(), ['district_id' => 'id']);
    }
}
