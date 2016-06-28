<?php

use console\db\Migration;

class m151129_072220_love_lib extends Migration
{
    public $tableName = "{{%love__lib}}";

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
            'fullname' => $this->string(),
            'text' => $this->text(),
            'img' => $this->string(),
            'link' => $this->string(),
        ]);

        $this->createIndex('idx_lib_status', $this->tableName, 'status');
    }

    public function down()
    {
        $this->dropTable($this->tableName);
    }
}
