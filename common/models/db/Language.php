<?php

namespace common\models\db;

use Yii;

/**
 * This is the model class for table "language".
 *
 * @property int $id
 * @property string $language_code
 * @property string $resource
 * @property string $value
 * @property int $active
 */
class Language extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'language';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['resource', 'value'], 'string'],
            [['active'], 'integer'],
            [['language_code'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'language_code' => 'Language Code',
            'resource' => 'Resource',
            'value' => 'Value',
            'active' => 'Active',
        ];
    }
}
