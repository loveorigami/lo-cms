<?php

use console\db\Migration;

class m151231_102240_love_tag extends Migration
{
    public $tableName = "{{%love__tag}}";

    public function up()
    {
        $this->createTable($this->tableName, [
            'id' => $this->primaryKey(),
            'status' => 'tinyint(1) NOT NULL DEFAULT 0',
            'author_id' => $this->integer()->notNull(),
            'updater_id' => $this->integer()->notNull(),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),

            'name' => $this->string()->notNull(),
            'frequency' =>$this->integer()->notNull()->defaultValue(0),
        ]);
    }

    public function down()
    {
        echo "m151231_102240_love_tag cannot be reverted.\n";

        return false;
    }

    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }

    public function safeDown()
    {
    }
    */
}
