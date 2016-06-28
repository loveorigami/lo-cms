<?php

use console\db\Migration;

class m160105_125213_love_cat extends Migration
{

    public function up()
    {

        //$this->createIndex('idx_love_aut', '{{%love__author_cat}}', 'aut_id');
        //$this->createIndex('idx_love_cat', '{{%love__author_cat}}', 'cat_id');

        $this->addForeignKey('fk_love_aut_cat_love_aut', '{{%love__author_cat}}', 'aut_id', '{{%love__author}}', 'id',  'CASCADE', 'CASCADE');
        $this->addForeignKey('fk_love_aut_cat_love_cat', '{{%love__author_cat}}', 'cat_id', '{{%love__cat}}', 'id', 'CASCADE', 'CASCADE');
    }

    public function down()
    {
        echo "m160105_125213_love_cat cannot be reverted.\n";

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
