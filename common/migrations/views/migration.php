<?php
/**
 * This view is used by console/controllers/MigrateController.php
 * The following variables are available in this view:
 */
/* @var $className string the new migration class name */

echo "<?php\n";
?>

use console\db\Migration;

class <?= $className ?> extends Migration
{
    public $tableGroup = "module";

    const TBL = 'item';
    //const TBL_CAT = 'cat';

    public function up()
    {
        $this->createTable($this->tn(self::TBL), [
            'id' => $this->primaryKey(),
            'status' => 'tinyint(1) NOT NULL DEFAULT 0',
            'author_id' => $this->integer()->notNull(),
            'updater_id' => $this->integer()->notNull(),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),

            'name' => $this->string()->notNull(),

        ]);

        $this->createIndex('idx_table_name_status', $this->tn(self::TBL), 'status');

/*
        $this->addForeignKey(
            $this->fk(self::TBL_CAT, self::TBL),
            $this->tn(self::TBL_CAT), 'cat_id',
            $this->tn(self::TBL), 'id',
            'CASCADE', 'RESTRICT'
        );
*/
    }

    public function down()
    {
        $this->dropTable($this->tableName);
    }


}