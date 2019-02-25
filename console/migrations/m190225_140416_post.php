<?php

use yii\db\Migration;

/**
 * Class m190225_140416_post
 */
class m190225_140416_post extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%post}}', [
            'id' => $this->primaryKey(),
            'category_id' => $this->integer(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
            'created_by' => $this->integer(),
            'updated_by' => $this->integer(),
            'image_post' => $this->string(),
            'description' => $this->string(),
            'content' => $this->text(),
            'active' => $this->integer(11),
            'meta_keywords' => $this->string(),
            'meta_description' => $this->string(),
            'meta_title' => $this->string(),
        ], $tableOptions);
        $data = [
            [
                'column' => 'category_id',
                'table' => 'category',
            ],
            [
                'column' => 'created_by',
                'table' => 'user',
            ],
            [
                'column' => 'updated_by',
                'table' => 'user',
            ]
        ];
        foreach ($data as $datum){
            $this->createIndex('idx-post-'.$datum['table']."_".$datum['column'],'post',$datum['column']);
            $this->addForeignKey('idx-post-'.$datum['table']."_".$datum['column'],'post',$datum['column'],$datum['table'],'id');
        }
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m190225_140416_post cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190225_140416_post cannot be reverted.\n";

        return false;
    }
    */
}
