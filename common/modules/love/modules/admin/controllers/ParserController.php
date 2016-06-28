<?php

namespace common\modules\love\modules\admin\controllers;

use Yii;
use yii\web\Controller;
use yii\helpers\Html;
use Sunra\PhpSimple\HtmlDomParser;
use common\modules\love\models\Parser;
use lo\core\helpers\StringHelper;
use lo\core\actions\crud;
use lo\core\components\settings\FormModel;

/**
 * PageController implements the CRUD actions for Author model.
 */
class ParserController extends Controller
{
    /**
     * Действия
     * @return array
     */

    protected $data = [];
    protected $get_aphs = []; // массив полученных строк
    protected $check_aphs = []; // проверенные строки
    protected $show_aphs = []; // готовые

    protected $msg = ''; // сообщения


    public function actions()
    {
        return [
            'settings' => [
                'class' => crud\Settings::class,
                'keys' => [
                    'love.parser.page' => [
                        'label' => 'Страница с афоризмами',
                        'type' => FormModel::TYPE_TEXTINPUT
                    ]
                ]
            ],
        ];
    }


    public function actionIndex()
    {
        $model = new Parser();
        return $this->render('index', [
            'model' => $model,
        ]);
    }

    public function actionGrab()
    {
        $this->data = \Yii::$app->request->post('dataq');
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

        if ($this->data['file']) {
            $html = HtmlDomParser::file_get_html(Yii::getAlias('@storage') . $this->data['file']);
        } else {
            $html = HtmlDomParser::file_get_html('http://www.e-reading.ws/chapter.php/22166/' . $this->data['id'] . '/Ermishin_-_Aforizmy.html');
        }

        if ($this->data['id']) {
            \Yii::$app->settings->set('love.parser.page', $this->data['id']);
        }

        /*
                // for sight.php?city=
                $item['title'] = $html->find('div.vrezka_sh a.lite', 0)->plaintext;
                $item['title'] = iconv("windows-1251", "utf-8", $item['title']);
        */

        $this->get_dom($html, 'div.section');
        $this->check_dom();
        $this->show_dom();
        if($this->data['to_db']){
            $this->todb_dom();
            echo json_encode('<pre>'.$this->msg . '</pre>');
        }
        else{
            $this->msg = 'просмотр<br>';
            echo json_encode('<pre>'.$this->msg . print_r($this->show_aphs, true) . '</pre>');
        }

    }

    // получаем строки
    private function get_dom($html, $tag_in = '')
    {
        foreach ($html->find('div.section') as $div) {
            foreach ($div->children() as $p) {
                $item['aph'] = Html::encode(str_replace(['&nbsp;', '&ndash;'], [' ', '-'], $p->plaintext));
                $item['tag'] = $p->tag;
                $item['str'] = StringHelper::strMd5($p->plaintext, false);
                $this->get_aphs[] = $item;
            }
        }
    }


// проверяем и убираем лишнее
    private function check_dom()
    {
        $aph = [];
        $i = 0;
        $f = 0;

        if ($this->data['glue']) {

            foreach ($this->get_aphs AS $a) {
                if ($a['tag'] != 'p') {
                    $i++;
                    $f = 0;
                } else {

                    preg_match('/\[([A-Za-z\d_]+)\]/is', $a['aph'], $sup);

                    if (isset($sup[0])) {
                        $text = str_replace($sup[0], '', $a['aph']);
                        $id_sup = $sup[1];
                    } else {
                        $text = $a['aph'];
                        $id_sup = 0;
                    }

                    if (!$f) {
                        $aph[$i]['text'] = $text;
                        $aph[$i]['sup'] = $id_sup;
                        $f = 1;
                    } else {
                        $aph[$i]['text'] = $aph[$i]['text'] . "\r\n" . $text;
                    }
                }
            }
        } //---------
        else {
            foreach ($this->get_aphs AS $a) {
                if ($a['tag'] == 'p') {

                    preg_match('/\[([A-Za-z\d_]+)\]/is', $a['aph'], $sup);

                    if (isset($sup[0])) {
                        $text = str_replace($sup[0], '', $a['aph']);
                        $id_sup = $sup[1];
                    } else {
                        $text = $a['aph'];
                        $id_sup = 0;
                    }

                    $aph[$i]['text'] = StringHelper::mbTrim($text);
                    $aph[$i]['sup'] = $id_sup;

                    $i++;
                }
            }
        }
        $this->check_aphs = $aph;
    }

    private function show_dom()
    {
        $aph = [];
        $i = 0;
        foreach ($this->check_aphs AS $aph) {
            $item['text'] = StringHelper::mbTrim($aph['text']);
            $item['str'] = StringHelper::strMd5($aph['text'], false);
            $item['id_prim'] = $aph['sup'];
            $item['hash'] = StringHelper::strMd5($aph['text']);
            $item['db'] = $this->getItem($item['hash']);
            $item['aut_id'] = $this->data['aut_id'];
            $this->show_aphs[] = $item;
        }
    }


    // вставка в базу
    function todb_dom(){
        $ii = 0;
        $iu = 0;
        foreach ($this->show_aphs AS $a){
            if($a['db']){
                $iu++;
                $model = Parser::findOne($a['db']);
                $model->setScenario('update');
                $model->lib_id = $this->data['id_lib'];
                $model->prim_id = $a['id_prim'];
                $model->text = $a['text'];
                $model->hash = $a['hash'];

                if($this->data['upd_aut']) $model->aut_id = $this->data['aut_id'];

                $model->save(false);

            }
            else{
                $ii++;
                $model = new Parser();
                $model->setScenario('insert');
                $model->lib_id = $this->data['id_lib'];
                $model->aut_id = $this->data['aut_id'];
                if(!$model->prim_id) $model->prim_id = $a['id_prim'];
                $model->text = $a['text'];
                $model->hash = $a['hash'];
                $model->status = 1;
                $model->save(false);
            }

        }

        $this->msg='вставлено: '.$ii.', обновлено: '.$iu;

    }


    private function getItem($hash)
    {
        $model = $this->findModel($hash);
        if ($model) {
            return $model->id;
        }
        return false;
    }


    /**
     * Finds the KeyStorageItem model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return KeyStorageItem the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($hash)
    {
        if (($model = Parser::find()->where('hash = :hash', ['hash' => $hash])->one()) !== null) {
            return $model;
        } else {
            return false;
        }
    }

    public function actionHash()
    {
        set_time_limit(0);

        //$models = Parser::find()->where(['like', 'text', 'nbsp'])->all();
        $models = Parser::find()->where(['like', 'text', 'br'])->all();

        foreach($models as $model){
            //$str = str_replace('&amp;nbsp;', ' ', $model->text);
            $str = str_replace('<br>', "\r\n", $model->text);
            $hash = StringHelper::strMd5($str);
            $model->setScenario('update');
            $model->hash = $hash;
            $model->text = $str;
           // $model->save();

            echo $str;
        }

    }

}
