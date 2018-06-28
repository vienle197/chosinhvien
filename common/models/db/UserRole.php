<?php

namespace common\models\db;

use Yii;

/**
 * This is the model class for table "user_role".
 *
 * @property int $id
 * @property int $roleId
 * @property int $userId
 * @property int $Active
 */
class UserRole extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user_role';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['roleId', 'userId', 'Active'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'roleId' => 'Role ID',
            'userId' => 'User ID',
            'Active' => 'Active',
        ];
    }
}
