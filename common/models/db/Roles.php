<?php

namespace common\models\db;

use Yii;

/**
 * This is the model class for table "roles".
 *
 * @property string $id
 * @property string $name
 * @property string $slug
 * @property string $description
 * @property int $level
 * @property string $created_at
 * @property string $updated_at
 */
class Roles extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'roles';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'slug'], 'required'],
            [['level'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['name', 'slug', 'description'], 'string', 'max' => 191],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'slug' => 'Slug',
            'description' => 'Description',
            'level' => 'Level',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
