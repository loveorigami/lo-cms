<?php
namespace console\controllers;

use Yii;
use yii\base\InvalidConfigException;
use yii\console\Controller;
use common\models\Article;
use yii\helpers\Console;

class ArticlesController extends Controller{
    public function actionIndex()
    {
		$name = $this->ansiFormat('Alex', Console::FG_YELLOW);
        echo "Hello, my name is $name.";
        echo 'yii articles/create' . PHP_EOL;
        echo 'yii articles/remove' . PHP_EOL;
    }

    public function actionCreate()
    {
        //$this->truncateTable($tableName);
		//$model = new Article();
		
// define new fixture
$db = \Yii::$app->get(isset($config['db']) ? $config['db'] : 'db');
$db->createCommand()->truncateTable('{{%article}}')->execute();
$q = new \yii\db\Query;

       for($i=1;$i<=32; $i++){
        $modelAttributes = array(
            'title' => 'title - '.$i,
            'body' => 'Comment text...',
            'status' => 1
        );
		//$model->setAttributes($modelAttributes);
		$db->createCommand()
                   ->insert('{{%article}}', $modelAttributes)->execute();
           //if(!$model->save()) throw new \Exception('Unable to save fixture');
        }

 /* // the $this variable refers to the CBdFixtureManager instance
$this->truncateTable($tableName);*/

    }
} 