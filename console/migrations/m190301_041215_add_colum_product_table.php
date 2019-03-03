<?php

use yii\db\Migration;

/**
 * Class m190301_041215_add_colum_product_table
 */
class m190301_041215_add_colum_product_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn("product",'description','text');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m190301_041215_add_colum_product_table cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190301_041215_add_colum_product_table cannot be reverted.\n";

        return false;
    }
    */
}
