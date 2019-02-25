<?php

use yii\db\Migration;

/**
 * Class m190225_140125_address
 */
class m190225_140125_address extends Migration
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

        $this->createTable('{{%address}}', [
            'id' => $this->primaryKey(),
            'customer_id' => $this->integer(11),
            'first_name' => $this->string(),
            'last_name' => $this->string(),
            'email' => $this->string(),
            'ward_id' => $this->integer(11),
            'district_id' => $this->integer(11),
            'city_id' => $this->integer(11),
            'is_default' => $this->integer(11),

            'status' => $this->smallInteger()->notNull()->defaultValue(10),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ], $tableOptions);
        $data = [
            [
                'column' => 'customer_id',
                'table' => 'customer',
            ],
            [
                'column' => 'ward_id',
                'table' => 'system_wards',
            ],
            [
                'column' => 'district_id',
                'table' => 'system_district',
            ],
            [
                'column' => 'city_id',
                'table' => 'system_city',
            ]
        ];
        foreach ($data as $datum){
            $this->createIndex('idx-address-'.$datum['table'],'address',$datum['column']);
            $this->addForeignKey('idx-address-'.$datum['table'],'address',$datum['column'],$datum['table'],'id');
        }
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m190225_140125_address cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190225_140125_address cannot be reverted.\n";

        return false;
    }
    */
}
