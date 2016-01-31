<?php

namespace console\controllers;

use yii\console\Controller;
use yii\db\Connection;

/**
 * DumperController take from old site Posts table to new site
 */
class RatingController extends Controller
{

    private $tmpDb;
    private $tmpTbl = 'ratings';
    private $table = '{{%rating}}';

    private $items = [];

    public function actionInit()
    {
        $this->tmpDb = new Connection([
            'dsn' => 'mysql:host=localhost;dbname=site_lo',
            'username' => 'root',
            'password' => '',
            'charset' => 'utf8',
        ]);

        $this->tmpDb->open();
        $query = "SELECT * FROM $this->tmpTbl  WHERE (id_page=2) OR (id_page=3) OR (id_page=4)";
        $this->items = $this->tmpDb->createCommand($query)->queryAll();

        // \Yii::$app->db->createCommand()->truncateTable($this->table)->execute();
        foreach ($this->items as $data) {
            $this->write($data);
        }

        echo "Success!\n";
        return Controller::EXIT_CODE_NORMAL;
    }


    private function write($data)
    {
        $id = $data['id_aph'];

        $votes = unserialize($data['used_ips']);

        if($votes){

            foreach($votes as $vote){
                if (strlen($vote) < 5 && $vote){
                    \Yii::$app->db->createCommand()->insert($this->table, [
                        'model_id' => $data['id_page'],
                        'user_id' => $vote,
                        'author_id' => $vote,
                        'updater_id' => $vote,
                        'target_id' => $id,
                        'value' => 1,
                    ])->execute();
                }
            }
    }
/*

        \Yii::$app->db->createCommand()->update($this->table, [
             'total_hits' => $data['total_hits'],
        ], "id = $id")->execute();*/
    }

    private function getUser($ip)
    {
        $query = "SELECT * FROM users  WHERE `ip` = '$ip'";
        $data = $this->tmpDb->createCommand($query)->queryOne();
        if($data) return $data['uid'];
        return false;
    }

}