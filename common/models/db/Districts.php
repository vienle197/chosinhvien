<?php

namespace common\models\db;

use Yii;

/**
 * This is the model class for table "districts".
 *
 * @property int $id
 * @property string $DistrictName Tên quận/huyện
 * @property int $CityId id thành phố
 * @property string $Note
 *
 * @property Cities $city
 * @property Wards[] $wards
 */
class Districts extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'districts';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['CityId'], 'integer'],
            [['DistrictName'], 'string', 'max' => 500],
            [['Note'], 'string', 'max' => 255],
            [['CityId'], 'exist', 'skipOnError' => true, 'targetClass' => Cities::className(), 'targetAttribute' => ['CityId' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'DistrictName' => 'Tên quận/huyện',
            'CityId' => 'id thành phố',
            'Note' => 'Note',
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
    public function getWards()
    {
        return $this->hasMany(Wards::className(), ['DisctrictID' => 'id']);
    }
}
