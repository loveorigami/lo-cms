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

}
