<?php

namespace console\controllers;

use yii\console\Controller;
use yii\db\Connection;

/**
 * DumperController take from old site Posts table to new site
 */
class CategoryController extends Controller
{

    private $tmpDb;
    private $tmpTbl = 'category';
    private $table = '{{%love__cat}}';

    private $items = [];

    public function actionInit()
    {
        $this->tmpDb = new Connection([
            'dsn' => 'mysql:host=localhost;dbname=orici',
            'username' => 'root',
            'password' => '',
            'charset' => 'utf8',
        ]);

        $this->tmpDb->open();
        $query = "SELECT * FROM $this->tmpTbl  WHERE (id_menu=3 or id_menu=4) AND id_cat!=1 ORDER BY pid, pos";
        $this->items = $this->tmpDb->createCommand($query)->queryAll();

        foreach ($this->items as $data) {
            $this->write($data);
        }

        echo "Success!\n";
        return Controller::EXIT_CODE_NORMAL;
    }


    private function write($data)
    {
        $id = $data['id_cat'];
        \Yii::$app->db->createCommand()->update($this->table, [
             'total_hits' => $data['total_hits'],
        ], "id = $id")->execute();
    }
}