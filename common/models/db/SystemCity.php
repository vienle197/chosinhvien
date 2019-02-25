<?php

namespace common\models\db;

use Yii;

/**
 * This is the model class for table "system_city".
 *
 * @property int $id
 * @property string $city_name
 * @property string $note
 *
 * @property SystemDistrict[] $systemDistricts
 * @property SystemWards[] $systemWards
 */
class SystemCity extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'system_city';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['city_name', 'note'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'city_name' => 'City Name',
            'note' => 'Note',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSystemDistricts()
    {
        return $this->hasMany(SystemDistrict::className(), ['city_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSystemWards()
    {
        return $this->hasMany(SystemWards::className(), ['city_id' => 'id']);
    }
}
