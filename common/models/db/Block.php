<?php

namespace common\models\db;

use Yii;

/**
 * This is the model class for table "block".
 *
 * @property int $id
 * @property string $block_name
 * @property string $type
 */
class Block extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'block';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['block_name', 'type'], 'required'],
            [['block_name', 'type'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'block_name' => 'Block Name',
            'type' => 'Type',
        ];
    }
}
