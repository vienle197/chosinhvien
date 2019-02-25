<?php

use yii\db\Migration;

/**
 * Class m190225_132905_wards
 */
class m190225_132905_wards extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('system_wards',[
            'id' => $this->primaryKey(),
            'wards_name' => $this->string(255),
            'district_id' => $this->integer(11),
            'city_id' => $this->integer(11),
            'note' => $this->string(255),
        ]);

        $this->createIndex('idx-system_wards-district','system_wards','district_id');
        $this->addForeignKey('fk-system_wards-district','system_wards','district_id','system_district','id');

        $this->createIndex('idx-system_wards-city','system_wards','city_id');
        $this->addForeignKey('fk-system_wards-city','system_wards','city_id','system_city','id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m190225_132905_wards cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190225_132905_wards cannot be reverted.\n";

        return false;
    }
    */
}
