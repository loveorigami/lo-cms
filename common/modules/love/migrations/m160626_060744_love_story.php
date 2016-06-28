<?php

use console\db\Migration;

class m160626_060744_love_story extends Migration
{
    public $tableGroup = "love";

    const TBL_STORY = 'story';
    const TBL_AUT_STORY = 'author_story';
    const TBL_AUT = 'author';

    public function up()
    {
        $this->createTable($this->tn(self::TBL_STORY), [
            'id' => $this->primaryKey(),
            'status' => 'tinyint(1) NOT NULL DEFAULT 0', // is_activ
            'author_id' => $this->integer()->notNull(),
            'updater_id' => $this->integer()->notNull(),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),

            'name' => $this->string()->notNull(),  // title
            'slug' => $this->string()->unique(),
            'lib_id' => $this->integer()->notNull(), // id_wrt
            'aut_id' => $this->integer()->notNull(), // id_aut
            'aut2_id' => $this->integer(), // id_aut2

            'epigraph' => $this->text(),
            'intro' => $this->text(),
            'prim' => $this->text(),
            'text' => $this->text()->notNull(), // story
            'img' => $this->string(), // preload
            'total_hits' => $this->integer()->notNull()->defaultValue(0), // view
        ]);

        $this->createIndex('idx_love_story_status', $this->tn(self::TBL_STORY), 'status');
        $this->createIndex('idx_love_story_lib', $this->tn(self::TBL_STORY), 'lib_id');
        $this->createIndex('idx_love_story_aut', $this->tn(self::TBL_STORY), 'aut_id');
        $this->createIndex('idx_love_story_aut2', $this->tn(self::TBL_STORY), 'aut2_id');

/*
        $this->createTable($this->tn(self::TBL_AUT_STORY), [
            'aut_id' => $this->integer()->notNull(),
            'story_id' => $this->integer()->notNull(),
        ]);

        $this->createIndex('idx_love_aut', $this->tn(self::TBL_AUT_STORY), 'aut_id');
        $this->createIndex('idx_love_story', $this->tn(self::TBL_AUT_STORY), 'story_id');


        $this->addForeignKey(
            $this->fk(self::TBL_AUT_STORY, self::TBL_STORY),
            $this->tn(self::TBL_AUT_STORY), 'story_id',
            $this->tn(self::TBL_STORY), 'id',
            'CASCADE', 'RESTRICT'
        );

        $this->addForeignKey(
            $this->fk(self::TBL_AUT_STORY, self::TBL_AUT),
            $this->tn(self::TBL_AUT_STORY), 'aut_id',
            $this->tn(self::TBL_AUT), 'id',
            'CASCADE', 'RESTRICT'
        );*/

    }


    public function down()
    {
        //$this->dropTable($this->tableName);
    }


}