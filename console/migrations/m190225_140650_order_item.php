<?php

use yii\db\Migration;

/**
 * Class m190225_140650_order_item
 */
class m190225_140650_order_item extends Migration
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

        $this->createTable('{{%order_item}}', [
            'id' => $this->primaryKey(),
            'order_id' => $this->integer(),
            'product_id' => $this->integer(),
            'price_amount' => $this->decimal(),
            'final_price_amount' => $this->decimal(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
            'active' => $this->integer(11),
        ], $tableOptions);
        $data = [
            [
                'column' => 'order_id',
                'table' => 'order',
            ],
            [
                'column' => 'product_id',
                'table' => 'product',
            ]
        ];
        foreach ($data as $datum){
            $this->createIndex('idx-order_item-'.$datum['table'],'order_item',$datum['column']);
            $this->addForeignKey('idx-order_item-'.$datum['table'],'order_item',$datum['column'],$datum['table'],'id');
        }
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m190225_140650_order_item cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190225_140650_order_item cannot be reverted.\n";

        return false;
    }
    */
}
