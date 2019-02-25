<?php

use yii\db\Migration;

/**
 * Class m190225_140638_user_roles
 */
class m190225_140638_user_roles extends Migration
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

        $this->createTable('{{%user_roles}}', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer(),
            'role_id' => $this->integer(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
            'created_by' => $this->integer(),
            'updated_by' => $this->integer(),
            'active' => $this->integer(11),
        ], $tableOptions);
        $data = [
            [
                'column' => 'user_id',
                'table' => 'user',
            ],
            [
                'column' => 'role_id',
                'table' => 'roles',
            ]
        ];
        foreach ($data as $datum){
            $this->createIndex('idx-user_roles-'.$datum['table'],'user_roles',$datum['column']);
            $this->addForeignKey('idx-user_roles-'.$datum['table'],'user_roles',$datum['column'],$datum['table'],'id');
        }
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m190225_140638_user_roles cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190225_140638_user_roles cannot be reverted.\n";

        return false;
    }
    */
}
