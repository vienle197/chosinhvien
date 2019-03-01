<?php

use yii\db\Migration;

/**
 * Class m190227_152413_update_product
 */
class m190227_152413_update_product extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn("product",'image','varchar(500)');
        $this->addColumn("product",'sale_percent','decimal(18,2)');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m190227_152413_update_product cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190227_152413_update_product cannot be reverted.\n";

        return false;
    }
    */
}
