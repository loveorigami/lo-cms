<?php

namespace backend\controllers;

use common\models\Permission;
use common\actions\crud;
use Yii;
use yii\web\Controller;

/**
 * PermissionController implements the CRUD actions for Permission model.
 */
class PermissionController extends Controller
{

    /**
     * Действия
     * @return array
     */
    public function actions()
    {

        $class = Permission::className();

        return [

            'index' => [
                'class' => crud\Index::className(),
                'modelClass' => $class,
            ],
            'create' => [
                'class' => crud\Create::className(),
                'modelClass' => $class,
            ],
            'update' => [
                'class' => crud\Update::className(),
                'modelClass' => $class,
            ],

            'view' => [
                'class' => crud\View::className(),
                'modelClass' => $class,
            ],

            'delete' => [
                'class' => crud\Delete::className(),
                'modelClass' => $class,
            ],

            'editable' => [
                'class' => crud\XEditable::className(),
                'modelClass' => $class,
            ],

        ];

    }

}