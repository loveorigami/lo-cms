<?php

use console\db\Migration;

class m160712_164729_i18_index extends Migration
{

    public function up()
    {
        $this->createIndex('idx_source_message_category', '{{%i18n_source_message}}', 'category');
        $this->createIndex('idx_message_language', '{{%i18n_message}}', 'language');
    }

    public function down()
    {
        $this->dropForeignKey('fk_message_source_message', '{{%i18n_message}}');
    }


}