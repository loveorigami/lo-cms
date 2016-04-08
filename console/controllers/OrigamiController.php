<?php

namespace console\controllers;

use yii\console\Controller;
use yii\db\Connection;

/**
 * DumperController take from old site Posts table to new site
 */
class OrigamiController extends Controller
{

    /**
     * Заполняет таблицу новостей со старой базы данных
     * @param $tablePost string Имя старой таблицы
     * @param $dbName string Имя базы данных
     * @param $userName string Имя пользователя базы данных
     * @param $password string Пароль пользователя базы данных
     * @param $userId integer user_id кто написал новость
     * @return int Код выхода
     * @throws \yii\base\InvalidConfigException
     * @throws \yii\db\Exception
     */

    private $tmpDb;
    private $tmpTbl = 'authors__ori';
    private $table = '{{%origami__author}}';

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

       // \Yii::$app->db->createCommand()->truncateTable($this->table)->execute();

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
            $image = '/origami/author/none.jpg';
        } else {
            $image = '/origami/author/' . $data['image'];
        }

        $status = $data['hide'] ? 0 : 1;

        \Yii::$app->db->createCommand()->insert($this->table, [
            'id' => $data['id_aut'],
            'status' => $status,

            'author_id' => 1,
            'updater_id' => 1,
            'created_at' => time(),
            'updated_at' => time(),

            'name' => $data['name_en'],
            'name_ru' => $data['name_ru'],
            'slug' => $data['alias'],
            'text' => $data['text_ru'],
            'link' => $data['link'],

            'flickr' => $data['flickr'],
            'facebook' => $data['facebook'],
            'youtube' => $data['youtube'],
            'email' => $data['email'],

            'in_wiki' => $data['in_wiki'],
            'in_ori' => $data['in_ori'],
            'in_news' => $data['in_news'],


            'total_hits' => $data['total_hits'],


            'ctr_id' => $data['id_ctr'], // страна
            'img' => $image,



        ])->execute();
    }
}