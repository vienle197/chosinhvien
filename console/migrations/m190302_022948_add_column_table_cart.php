<?php

use yii\db\Migration;

/**
 * Class m190302_022948_add_column_table_cart
 */
class m190302_022948_add_column_table_cart extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('cart','quantity','int');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m190302_022948_add_column_table_cart cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190302_022948_add_column_table_cart cannot be reverted.\n";

        return false;
    }
    */
}
