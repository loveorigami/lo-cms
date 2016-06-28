<?php

namespace common\modules\love\modules\admin\controllers;

use Yii;
use common\modules\love\models\Category;
use yii\web\Controller;
use lo\core\actions\crud;

/**
 * PageController implements the CRUD actions for Author model.
 */
class CategoryController extends Controller
{
    /**
     * Действия
     * @return array
     */

    public function actions()
    {
        $class = Category::class;
        return [
            'index' => [
                'class' => crud\TIndex::class,
                'modelClass' => $class,
            ],

            'create' => [
                'class' => crud\TCreate::class,
                'modelClass' => $class,
            ],

            'update' => [
                'class' => crud\TUpdate::class,
                'modelClass' => $class,
            ],

            'view' => [
                'class' => crud\View::class,
                'modelClass' => $class,
            ],

            'delete' => [
                'class' => crud\TDelete::class,
                'modelClass' => $class,
            ],

            'groupdelete' => [
                'class' => crud\TGroupDelete::class,
                'modelClass' => $class,
            ],

            'up' => [
                'class' => crud\TUp::class,
                'modelClass' => $class,
            ],

            'down' => [
                'class' => crud\TDown::class,
                'modelClass' => $class,
            ],

            'replace' => [
                'class' => crud\TReplace::class,
                'modelClass' => $class,
            ],

            'editable'=>[
                'class'=>crud\XEditable::class,
                'modelClass'=>$class,
            ],

            'list'=>[
                'class'=>crud\ListId::class,
                'modelClass'=>$class,
            ],
        ];
    }

}
