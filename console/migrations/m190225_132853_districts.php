<?php

use yii\db\Migration;

/**
 * Class m190225_132853_districts
 */
class m190225_132853_districts extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('system_district',[
            'id' => $this->primaryKey(),
            'district_name' => $this->string(255),
            'city_id' => $this->integer(11),
            'note' => $this->string(255),
        ]);

        $this->createIndex('idx-system_district-city','system_district','city_id');
        $this->addForeignKey('fk-system_district-city','system_district','city_id','system_city','id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m190225_132853_districts cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190225_132853_districts cannot be reverted.\n";

        return false;
    }
    */
}
