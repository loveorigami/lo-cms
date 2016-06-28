<?php

namespace common\modules\love\modules\admin\controllers;

use Yii;
use common\modules\love\models\Tag;
use yii\web\Controller;
use lo\core\actions\crud;

use Sunra\PhpSimple\HtmlDomParser;

/**
 * PageController implements the CRUD actions for Author model.
 */
class TagController extends Controller
{
    /**
     * Действия
     * @return array
     */

    public function actions()
    {
        $class = Tag::class;
        return [
            'index'=>[
                'class'=> crud\Index::class,
                'modelClass'=>$class,
            ],
            'view'=>[
                'class'=> crud\View::class,
                'modelClass'=>$class,
            ],
            'create'=>[
                'class'=> crud\Create::class,
                'modelClass'=>$class,
            ],
            'update'=>[
                'class'=> crud\Update::class,
                'modelClass'=>$class,
            ],
            'delete'=>[
                'class'=> crud\Delete::class,
                'modelClass'=>$class,
            ],

            'editable'=>[
                'class'=>crud\XEditable::class,
                'modelClass'=>$class,
            ],
            'list'=>[
                'class'=>crud\ListStr::class,
                'modelClass'=>$class,
            ],
        ];
    }

    public function actionParser()
    {
        return $this->render('parser');
    }

    public function actionGrab()
    {
        $post = \Yii::$app->request->post('dataq');

        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $id = $post['id'];

        //$url = 'http://suntime.com.ua/sight.php?city=';
        $url = 'http://litafor.ru/by-theme';

        $html = HtmlDomParser::file_get_html($url);

        /*
                // for sight.php?city=
                $item['title'] = $html->find('div.vrezka_sh a.lite', 0)->plaintext;
                $item['title'] = iconv("windows-1251", "utf-8", $item['title']);

                $item['intro'] = $html->find('div.vrezka_sh span', 0)->plaintext;
                $item['intro'] = iconv("windows-1251", "utf-8", $item['intro']);
        */

        // for city_item.php?id=
        $item['text'] = $html->find('.internal_navy a');
        $item['text'] = iconv("windows-1251", "utf-8", $item['text']);
       // $item['res'] = $this->addItem($id, $item);

        $res = print_r($item, true);
        //print_r($item['title']);
        echo json_encode($res);
    }

    private function addItem($id, $item){

        $model = $this->findModel($id);

        if($model){
            $model->setScenario('update');
            $model->text = $item['text'];
            $model->save();
            return 'есть запись';
        } else{
            return 'без добавления';
            $model = new Town();
            $model->setScenario('insert');
            $model->id = $id;
            $model->name = $item['title'];
            $model->intro = $item['intro'];
            //var_dump($model->attributes);

            if($model->validate()){
                $model->save();
                return 'запись добавлена';
            }
            else{
                return print_r($model->getErrors(), true);
            }
        }
    }

    /**
     * Finds the KeyStorageItem model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return KeyStorageItem the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Town::findOne($id)) !== null) {
            return $model;
        } else {
            return false;
        }
    }

}
