<?php

use console\db\Migration;

class m151129_072221_love_prim extends Migration
{
    public $tableName = "{{%love__aph_prim}}";

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
        ]);

        $this->createIndex('idx_prim_status', $this->tableName, 'status');
    }

    public function down()
    {
        $this->dropTable($this->tableName);
    }
}
