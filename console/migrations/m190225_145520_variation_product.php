<?php

use yii\db\Migration;

/**
 * Class m190225_145520_variation_product
 */
class m190225_145520_variation_product extends Migration
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

        $this->createTable('{{%variation_product}}', [
            'id' => $this->primaryKey(),
            'parent_sku' => $this->string(),
            'variation_id' => $this->integer(),
            'product_id' => $this->integer(),
            'active' => $this->integer(),
        ], $tableOptions);
        $data = [
            [
                'column' => 'variation_id',
                'table' => 'variation',
            ],
            [
                'column' => 'product_id',
                'table' => 'product',
            ]
        ];
        foreach ($data as $datum){
            $this->createIndex('idx-variation_product-'.$datum['table'],'variation_product',$datum['column']);
            $this->addForeignKey('idx-variation_product-'.$datum['table'],'variation_product',$datum['column'],$datum['table'],'id');
        }
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m190225_145520_variation_product cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190225_145520_variation_product cannot be reverted.\n";

        return false;
    }
    */
}
