<?php

namespace common\models\db;

use Yii;

/**
 * This is the model class for table "wards".
 *
 * @property int $id
 * @property string $WardName Tên phường/xã
 * @property int $DistrictId Id Quận Huyện
 * @property string $Note
 *
 * @property Districts $district
 */
class Wards extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'wards';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['WardName'], 'required'],
            [['DistrictId'], 'integer'],
            [['Note'], 'string'],
            [['WardName'], 'string', 'max' => 555],
            [['DistrictId'], 'exist', 'skipOnError' => true, 'targetClass' => Districts::className(), 'targetAttribute' => ['DistrictId' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'WardName' => 'Tên phường/xã',
            'DistrictId' => 'Id Quận Huyện',
            'Note' => 'Note',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDistrict()
    {
        return $this->hasOne(Districts::className(), ['id' => 'DistrictId']);
    }
}
