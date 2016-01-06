<?php

namespace console\controllers;

use yii\console\Controller;
use yii\db\Connection;

/**
 * DumperController take from old site Posts table to new site
 */
class CategoryController extends Controller
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






    public function actionCheck()
    {
        $query = "SELECT * FROM {{%love__author_cat}}";
        $items = \Yii::$app->db->createCommand($query)->queryAll();

        foreach($items as $item){
            $aut_id = $item['aut_id'];
            $query2 = "SELECT * FROM {{%love__author}} WHERE id = $aut_id";
            $items2 = \Yii::$app->db->createCommand($query2)->queryAll();

            if(!count($items2)) echo $aut_id.'</br>';
        }


        //\Yii::$app->db->createCommand()->insert('{{%love__author_cat}}')->execute();
    }
}