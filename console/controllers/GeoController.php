<?php

namespace console\controllers;

use yii\console\Controller;
use yii\db\Connection;

/**
 * DumperController take from old site Posts table to new site
 */
class GeoController extends Controller
{


    private $tmpDb;
    private $tmpTbl = 'country';
    private $table = '{{%geo__country}}';

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
        $query = "SELECT * FROM $this->tmpTbl";
        $this->items = $this->tmpDb->createCommand($query)->queryAll();

        \Yii::$app->db->createCommand()->truncateTable($this->table)->execute();

        foreach ($this->items as $data) {
            $this->write($data);
            //echo $data['id_aut'];
        }

        echo "Success!\n";
        return Controller::EXIT_CODE_NORMAL;
    }


    private function write($data)
    {
        if ($data['image'] == 'nety.jpg') {
            $image = '/geo/country/none.jpg';
        } else {
            $image = '/geo/country/' . $data['image'];
        }

        $status = $data['hide'] ? 0 : 1;

        \Yii::$app->db->createCommand()->insert($this->table, [
            'id' => $data['id_ctr'],
            'status' => $status,

            'author_id' => 1,
            'updater_id' => 1,
            'created_at' => time(),
            'updated_at' => time(),

            'name' => $data['name_ru'],
            'name_en' => $data['name_en'],
            'pos' => $data['pos'],

            'img' => $image,



        ])->execute();
    }
}