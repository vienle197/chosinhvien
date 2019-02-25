<?php

use yii\db\Migration;

/**
 * Class m190225_170911_image
 */
class m190225_170911_image extends Migration
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

        $this->createTable('{{%image}}', [
            'id' => $this->primaryKey(),
            'url' => $this->string(),
            'product_id' => $this->integer(),
            'category_id' => $this->integer(),
            'customer_id' => $this->integer(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
            'active' => $this->integer()->defaultValue(1),
        ], $tableOptions);
        $data = [
            [
                'column' => 'customer_id',
                'table' => 'customer',
            ],
            [
                'column' => 'product_id',
                'table' => 'product',
            ],
            [
                'column' => 'category_id',
                'table' => 'category',
            ]
        ];
        foreach ($data as $datum){
            $this->createIndex('idx-image-'.$datum['table'],'image',$datum['column']);
//            $this->addForeignKey('idx-image-'.$datum['table'],'image',$datum['column'],$datum['table'],'id');
        }
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m190225_170911_image cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190225_170911_image cannot be reverted.\n";

        return false;
    }
    */
}
