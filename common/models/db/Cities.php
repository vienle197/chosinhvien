<?php

namespace common\models\db;

use Yii;

/**
 * This is the model class for table "cities".
 *
 * @property int $id
 * @property string $CityName Tên Thành Phố
 * @property string $Note
 *
 * @property Disctricts[] $disctricts
 */
class Cities extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cities';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['CityName'], 'string', 'max' => 500],
            [['Note'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'CityName' => 'Tên Thành Phố',
            'Note' => 'Note',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDisctricts()
    {
        return $this->hasMany(Disctricts::className(), ['CityId' => 'id']);
    }
}
