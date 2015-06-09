<?php
namespace console\controllers;

use Yii;
use yii\base\InvalidConfigException;
use yii\console\Controller;
use yii\console\Exception;
use yii\helpers\Console;

class OrischoolController extends Controller{
    public function actionIndex()
    {
		//$name = $this->ansiFormat('Alex', Console::FG_YELLOW);
        //echo "Hello, my name is $name.";
        echo 'php yii orischoo/cat' . PHP_EOL;
        echo 'php yii orischoo/cat' . PHP_EOL;
        echo 'php yii orischoo/cat' . PHP_EOL;
    }

    public function actionCat()
    {
        $q = new \yii\db\Query;

        // define new fixture
        $db = \Yii::$app->get(isset($config['db']) ? $config['db'] : 'db');
        if (!$db instanceof \yii\db\Connection) {
            throw new Exception('The "db" option must refer to a valid database application component.');
        }

        foreach ($q->select('*')->from('{{%ori__cat}}')->all() as $row) {
            //echo Yii::getAlias('@storageUrl').'/orischool/thumb/cat/'.$row['image']. PHP_EOL;
            //$img = '/orischool/thumb/cat/'.$row['image'];
            $img = $row['image'];
            // http://www.yiiframework.com/doc-2.0/yii-db-command.html#update%28%29-detail

           $db->createCommand()
                ->update(
                    '{{%ori__cat}}',
                    ['image' => $img],
                    ['id' => $row['id']] // where
                )
                ->execute();
            $this->stdout($row['id']. "updated.\n");

        }

       $op1 = $this->confirm('Update image path?');
        if($op1){
        echo '111';
            }
        else{
            echo '222';
        };

       $op = $this->select('Update image path?', [0,1,2,3]);
       echo $op;



/*           $db->createCommand()
               ->update(
                   '{{%ori__cat}}',
                   ['message' => new \yii\db\Expression("CONCAT('@@',message,'@@')")],
                   ['in', 'id', $obsolete]
               )->execute();
           $this->stdout("updated.\n");
        }*/
    }
} 