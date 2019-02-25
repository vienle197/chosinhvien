<?php

use yii\db\Migration;

/**
 * Class m190225_152356_cart
 */
class m190225_152356_cart extends Migration
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

        $this->createTable('{{%cart}}', [
            'id' => $this->primaryKey(),
            'customer_id' => $this->integer(),
            'product_id' => $this->integer(),
            'price_amount' => $this->decimal(),
            'final_price_amount' => $this->decimal(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
            'active' => $this->integer(11),
        ], $tableOptions);
        $data = [
            [
                'column' => 'customer_id',
                'table' => 'customer',
            ],
            [
                'column' => 'product_id',
                'table' => 'product',
            ]
        ];
        foreach ($data as $datum){
            $this->createIndex('idx-cart-'.$datum['table'],'cart',$datum['column']);
            $this->addForeignKey('idx-cart-'.$datum['table'],'cart',$datum['column'],$datum['table'],'id');
        }
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m190225_152356_cart cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190225_152356_cart cannot be reverted.\n";

        return false;
    }
    */
}
