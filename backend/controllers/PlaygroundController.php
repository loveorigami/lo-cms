<?php

namespace backend\controllers;

use Yii;
use backend\models\SystemLog;
use backend\models\search\SystemLogSearch;
use yii\helpers\VarDumper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * LogController implements the CRUD actions for SystemLog model.
 */
class PlaygroundController extends Controller
{
    /**
     * Lists all SystemLog models.
     * @return mixed
     */
    public function actionIndex()
    {

        return $this->render('index');
    }

    /**
     * Lists all SystemLog models.
     * @return mixed
     */
    public function actionPjax()
    {
        return $this->render('pjax');
    }

    /**
     * Lists all SystemLog models.
     * @return mixed
     */
    public function actionGetTime()
    {
        //return $this->render('pjax', ['time' => date('H:i:s')]);
        $req = array_merge($_GET, $_POST);
        if (isset($req["delay"])) {
            //sleep(1);
        }
        header('Content-type: application/json');
        echo json_encode($req);
    }
}
