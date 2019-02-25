<?php

use yii\db\Migration;

/**
 * Class m190225_140214_category
 */
class m190225_140214_category extends Migration
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

        $this->createTable('{{%category}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'origin_name' => $this->string(),
            'parent_id' => $this->integer(),
            'description' => $this->string(),
            'active' => $this->integer(11),
            'meta_keywords' => $this->string(),
            'meta_description' => $this->string(),
            'meta_title' => $this->string(),
        ], $tableOptions);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m190225_140214_category cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190225_140214_category cannot be reverted.\n";

        return false;
    }
    */
}
