<?php

use console\db\Migration;

class m160117_152631_rating_fields extends Migration
{
    public $tableName = "{{%love__aph}}";

    public function up()
    {
        /*  ALTER TABLE `YOUR_TARGET_TABLE_NAME` ADD (
                `rating` smallint(6) NOT NULL,
                `aggregate_rating` float(3,2) unsigned NOT NULL
        )*/

        $this->addColumn($this->tableName, 'rating', 'smallint(6) NOT NULL');
        $this->addColumn($this->tableName, 'aggregate_rating', 'float(3,2) unsigned NOT NULL');
    }

    public function down()
    {
        $this->dropColumn($this->tableName, 'rating');
        $this->dropColumn($this->tableName, 'aggregate_rating');
    }

}
