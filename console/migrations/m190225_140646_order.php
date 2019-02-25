<?php

use yii\db\Migration;

/**
 * Class m190225_140646_order
 */
class m190225_140646_order extends Migration
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

        $this->createTable('{{%order}}', [
            'id' => $this->primaryKey(),
            'customer_id' => $this->integer(),
            'promotion_id' => $this->integer(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
            'supported_by' => $this->integer(),
            'first_name' => $this->string(),
            'last_name' => $this->string(),
            'email' => $this->string(),
            'phone' => $this->string(),
            'address' => $this->string(),
            'ward_id' => $this->integer(),
            'district_id' => $this->integer(),
            'city_id' => $this->integer(),
            'payment_method' => $this->string()->comment("COD,ONLINE"),
            'note' => $this->string(),
            'status' => $this->string(),
            'total_amount' => $this->decimal(),
            'final_total_amount' => $this->decimal(),
            'total_price_amount' => $this->decimal()->comment("Tổng tiền giá sản phẩm"),
            'total_fee_amount' => $this->decimal()->comment("Tổng tiền phí sản phẩm"),
            'active' => $this->integer(11),
        ], $tableOptions);
        $data = [
            [
                'column' => 'customer_id',
                'table' => 'customer',
            ],
            [
                'column' => 'promotion_id',
                'table' => 'promotion',
            ],
            [
                'column' => 'supported_by',
                'table' => 'user',
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
            $this->createIndex('idx-order-'.$datum['table'],'order',$datum['column']);
            $this->addForeignKey('idx-order-'.$datum['table'],'order',$datum['column'],$datum['table'],'id');
        }
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m190225_140646_order cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190225_140646_order cannot be reverted.\n";

        return false;
    }
    */
}
