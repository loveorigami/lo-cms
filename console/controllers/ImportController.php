<?php

namespace console\controllers;

use yii\console\Controller;
use yii\db\Connection;

/**
 * DumperController take from old site Posts table to new site
 */
class ImportController extends Controller
{
    public $tmpDb;
    private $items = [];

    public $sinc = [
        ['from'=>'story', 'to'=>'{{%love__story}}', 'class'=>'console\controllers\import\Story', 'skip'=>false],
    ];

    public function actionIndex()
    {
        $this->tmpDb = new Connection([
            'dsn' => 'mysql:host=localhost;dbname=site_lo',
            'username' => 'root',
            'password' => '',
            'charset' => 'utf8',
        ]);

        $this->tmpDb->open();
        
        \Yii::$app->db->createCommand("SET foreign_key_checks = 0")->execute();
        
        foreach($this->sinc as $tbl){
            if($tbl['skip']) continue;
            
            $query = "SELECT * FROM {$tbl['from']}";
            $this->items = $this->tmpDb->createCommand($query)->queryAll();
            \Yii::$app->db->createCommand()->truncateTable($tbl['to'])->execute();
            
            $import = new $tbl['class'];
            foreach ($this->items as $data) {
                $import->write($tbl['to'], $data);
            }
        }
        
        \Yii::$app->getDb()->createCommand("SET foreign_key_checks = 1")->execute();
        
        echo "Success!\n";
        
        return Controller::EXIT_CODE_NORMAL;
    }

}