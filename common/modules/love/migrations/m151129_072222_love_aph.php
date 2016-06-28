<?php

use console\db\Migration;

class m151129_072222_love_aph extends Migration
{
    public $tableName = "{{%love__aph}}";

    public function up()
    {
        $this->createTable($this->tableName, [
            'id' => $this->primaryKey(),
            'status' => 'tinyint(1) NOT NULL DEFAULT 0',
            'author_id' => $this->integer()->notNull(),
            'updater_id' => $this->integer()->notNull(),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),

            'aut_id' => $this->integer()->notNull(),
            'lib_id' => $this->integer()->notNull(),
            'prim_id' => $this->integer()->notNull(),

            'text' => $this->text()->notNull(),
            'prim_str' => $this->string(),
            'lib_str' => $this->string(),
            'dop' => $this->string(),
            'hash' => $this->string(32)->notNull(),
        ]);

        $this->createIndex('idx_aph_status', $this->tableName, 'status');
        $this->createIndex('idx_aph_prim', $this->tableName, 'prim_id');
        $this->createIndex('idx_aph_lib', $this->tableName, 'prim_id');

        $this->addForeignKey('fk_love_aph_love_aut', $this->tableName, 'aut_id', '{{%love__author}}', 'id', 'CASCADE', 'CASCADE');
    }

    public function down()
    {
        $this->dropTable($this->tableName);
    }
}
