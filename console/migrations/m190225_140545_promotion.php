<?php

use yii\db\Migration;

/**
 * Class m190225_140545_promotion
 */
class m190225_140545_promotion extends Migration
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

        $this->createTable('{{%promotion}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'code' => $this->string(),
            'description' => $this->string(),
            'active' => $this->integer(11),
            'created_at' => $this->integer(11),
            'updated_at' => $this->integer(11),
            'created_by' => $this->integer(11),
            'updated_by' => $this->integer(11),
            'meta_keywords' => $this->string(),
            'meta_description' => $this->string(),
            'meta_title' => $this->string(),
            'type' => $this->string()->comment("REFUND, COUPON, PROMOTION"),
            'for_email' => $this->string()->comment("cho email nào"),
            'for_categories' => $this->string(),
            'for_products' => $this->string(),
            'min_price_access' => $this->decimal()->comment("giá thấp nhất đc áp dụng"),
            'max_price_access' => $this->decimal()->comment("giá cao nhất được áp dụng"),
            'min_price' => $this->decimal()->comment("số tiền nhỏ nhất được giảm"),
            'max_price' => $this->decimal()->comment("số tiền lớn nhất được giảm"),
            'expired_time' => $this->integer(11),
            'max_order' => $this->integer(11)->comment('số lượng đơn tối đa có thể áp dụng'),
            'count_order' => $this->integer(11)->comment('số lượng đơn đã áp dụng'),
            'count_order_customer' => $this->integer(11)->comment('số lượng tối đa cho 1 customer'),
        ], $tableOptions);
        $data = [
            [
                'column' => 'created_by',
                'table' => 'user',
            ],
            [
                'column' => 'updated_by',
                'table' => 'user',
            ]
        ];
        foreach ($data as $datum){
            $this->createIndex('idx-promotion-'.$datum['table']."-".$datum['column'],'promotion',$datum['column']);
            $this->addForeignKey('idx-promotion-'.$datum['table']."-".$datum['column'],'promotion',$datum['column'],$datum['table'],'id');
        }
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m190225_140545_promotion cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190225_140545_promotion cannot be reverted.\n";

        return false;
    }
    */
}
