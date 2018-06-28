<?php

namespace common\models\db;

use Yii;

/**
 * This is the model class for table "news".
 *
 * @property int $id
 * @property int $categoryId
 * @property int $userId
 * @property string $image
 * @property string $name
 * @property string $description
 * @property string $content
 * @property int $published
 * @property string $createDate
 * @property string $updateDate
 * @property string $createEmail
 * @property string $updateEmail
 * @property int $type
 */
class News extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'news';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['categoryId', 'userId', 'published', 'type'], 'integer'],
            [['content'], 'string'],
            [['createDate', 'updateDate'], 'safe'],
            [['image'], 'string', 'max' => 250],
            [['name'], 'string', 'max' => 2500],
            [['description'], 'string', 'max' => 4000],
            [['createEmail', 'updateEmail'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'categoryId' => 'Category ID',
            'userId' => 'User ID',
            'image' => 'Image',
            'name' => 'Name',
            'description' => 'Description',
            'content' => 'Content',
            'published' => 'Published',
            'createDate' => 'Create Date',
            'updateDate' => 'Update Date',
            'createEmail' => 'Create Email',
            'updateEmail' => 'Update Email',
            'type' => 'Type',
        ];
    }
}
