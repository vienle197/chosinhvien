<?php

use yii\db\Migration;

/**
 * Class m190225_132835_cities
 */
class m190225_132835_cities extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('system_city',[
            'id' => $this->primaryKey(),
            'city_name' => $this->string(255),
            'note' => $this->string(255),
        ]);

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m190225_132835_cities cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190225_132835_cities cannot be reverted.\n";

        return false;
    }
    */
}
