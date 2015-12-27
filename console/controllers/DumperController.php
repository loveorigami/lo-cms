<?php

namespace console\controllers;

use yii\console\Controller;
use yii\db\Connection;

/**
 * DumperController take from old site Posts table to new site
 */
class DumperController extends Controller
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
    private $items = [];
    private $i_count = 1;
    private $a_link;
    private $level = 1;

    public function actionDump($table = 'menu', $dbName = 'orici', $userName = 'root', $password = '')
    {
        $this->tmpDb = new Connection([
            'dsn' => 'mysql:host=localhost;dbname=' . $dbName,
            'username' => $userName,
            'password' => $password,
            'charset' => 'utf8',
        ]);

        $this->tmpDb->open();
        $query = "SELECT * FROM $table WHERE id_menu=3 AND id_cat!=1 ORDER BY pid, pos";
        $this->items = $this->tmpDb->createCommand($query)->queryAll();

    }

    public function actionCat()
    {
        \Yii::$app->db->createCommand()->truncateTable('{{%love__cat_aph}}')->execute();

        $this->actionDump('category');
        $a_link = [];

        foreach ($this->items as $data) {

            $i_father_id = $data['pid'];
            $i_child_id = $data['id_cat'];
            if (!array_key_exists($i_father_id, $a_link)) {
                $a_link[$i_father_id] = [];
            }
            $a_link[$i_father_id][] = $i_child_id;

            //echo $data['id_cat']."\n";
        }

        $this->a_link = $a_link;
        $this->traverse(0);

        echo "Success!\n";
        return Controller::EXIT_CODE_NORMAL;
    }

    public function traverse($i_id)
    {
        $i_lft = $this->i_count;
        $this->i_count++;

        $a_kid = $this->get_children($i_id);
        if ($a_kid) {
            $this->level++;
            foreach ($a_kid as $a_child) {
                $this->traverse($a_child);
            }
            $this->level--;
        }
        $i_rgt = $this->i_count;
        $this->i_count++;
        $this->write($i_lft, $i_rgt, $i_id, $this->level);
    }

    private function get_children($i_id)
    {
        return $this->a_link[$i_id];
    }

    private function write($i_lft, $i_rgt, $i_id, $level)
    {
        $query = "SELECT * FROM `category` WHERE `id_cat`  = '" . $i_id . "'";
        $row = $this->tmpDb->createCommand($query)->queryOne();
        $root = 0;

        if ($row['image'] == 'nety.jpg') {
            $image = '/love/cat/none.jpg';
        }
        else{
            $image = '/love/cat/' . $row['image'];
        }


        if ($i_lft == 1) {
            $level = 1;
            $root = 1;
            $i_id = 1;
            $image = '';
        }


        \Yii::$app->db->createCommand()->insert('{{%love__cat_aph}}', [
            'id' => $i_id,
            'root' => $root,
            'lft' => $i_lft,
            'rgt' => $i_rgt,
            'level' => $level,
            'status' => 1,

            'author_id' => 1,
            'updater_id' => 1,
            'created_at' => time(),
            'updated_at' => time(),

            'name' => $row['name'],
            'slug' => $row['alias'],
            'intro' => $row['intro'],
            'intro2' => $row['subintro'],
            'img' => $image,

        ])->execute();
    }
}