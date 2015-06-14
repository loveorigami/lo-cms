<?php

use yii\db\Schema;
use yii\db\Migration;

class m140703_123104_page extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%page}}', [
            'id' => Schema::TYPE_PK,
			'author_id' => Schema::TYPE_INTEGER,
            'updater_id' => Schema::TYPE_INTEGER,
            'slug' => Schema::TYPE_STRING . '(2048) NOT NULL',
            'name' => Schema::TYPE_STRING . '(512) NOT NULL',
            'text' => Schema::TYPE_TEXT . ' NOT NULL',
            'status' => Schema::TYPE_SMALLINT . ' NOT NULL',
            'created_at' => Schema::TYPE_INTEGER,
            'updated_at' => Schema::TYPE_INTEGER,
        ], $tableOptions);

        $this->insert('{{%page}}', [
		    'author_id'=>'1',
            'updater_id'=>'1',
            'slug'=>'about',
            'name'=>'About',
            'text'=>'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
            'status'=>\common\models\Page::STATUS_PUBLISHED,
            'created_at'=>time(),
            'updated_at'=>time(),
        ]);
    }

    public function down()
    {
        $this->dropTable('{{%page}}');
    }
}
