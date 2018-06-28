<?php

namespace common\models\db;

use Yii;

/**
 * This is the model class for table "languages".
 *
 * @property int $id
 * @property int $LanguageId
 * @property string $ResourceName
 * @property string $ResourceValue
 * @property int $Active
 */
class Languages extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'languages';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['LanguageId', 'Active'], 'integer'],
            [['ResourceValue'], 'string'],
            [['ResourceName'], 'string', 'max' => 200],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'LanguageId' => 'Language ID',
            'ResourceName' => 'Resource Name',
            'ResourceValue' => 'Resource Value',
            'Active' => 'Active',
        ];
    }
}
