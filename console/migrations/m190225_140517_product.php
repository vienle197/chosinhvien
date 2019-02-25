<?php

use yii\db\Migration;

/**
 * Class m190225_140517_product
 */
class m190225_140517_product extends Migration
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

        $this->createTable('{{%product}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'sku' => $this->string(),
            'category_id' => $this->integer(),
            'parent_sku' => $this->string(),
            'manufacturer_id' => $this->integer()->comment("id nhà sản xuất"),
            'merchant_id' => $this->integer()->comment('id người bán'),
            'stock_quantity' => $this->integer()->comment('Số lượng hàng có thể mua'),
            'sold_quantity' => $this->integer()->comment('Số lượng hàng đã bán'),
            'min_quantity' => $this->integer()->comment('Số lượng tối thiểu trong 1đơn'),
            'max_quantity' => $this->integer()->comment('Số lượng tối đa trong 1đơn'),
            'disable_buy_now' => $this->integer()->comment('tắt nút mua'),
            'disable_add_to_card' => $this->integer()->comment('tắt nút cho vào giỏ'),
            'is_pre_order' => $this->integer()->comment('cho phép đặt hàng trước'),
            'price' => $this->decimal()->comment('giá gốc 1 sản phẩm'),
            'sale_price' => $this->decimal()->comment('giá gốc đã giảm'),
            'expired_time_sale_price' => $this->integer()->comment("Thời gian hết hạn sale"),
            'active' => $this->integer(11),
            'meta_keywords' => $this->string(),
            'meta_description' => $this->string(),
            'meta_title' => $this->string(),
        ], $tableOptions);
        $data = [
            [
                'column' => 'category_id',
                'table' => 'category',
            ],
            [
                'column' => 'manufacturer_id',
                'table' => 'manufacturer',
            ],
            [
                'column' => 'merchant_id',
                'table' => 'merchant',
            ]
        ];
        foreach ($data as $datum){
            $this->createIndex('idx-product-'.$datum['table'],'product',$datum['column']);
            $this->addForeignKey('idx-product-'.$datum['table'],'product',$datum['column'],$datum['table'],'id');
        }
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m190225_140517_product cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190225_140517_product cannot be reverted.\n";

        return false;
    }
    */
}
