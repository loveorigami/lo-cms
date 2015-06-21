<?php
namespace backend\widgets;

use Yii;
use yii\base\Widget;
use yii\helpers\Html;

/**
 * Class CrudLinks
 * Класс для отображения ссылок на CRUD действия
 * @package backend\widgets
 * @author Churkin Anton <webadmin87@gmail.com>
 */
class CrudLinks extends Widget
{

    /**
     * Константы CRUD действий
     */

    const CRUD_LIST = "list";

    const CRUD_VIEW = "view";

    /**
     * @var string действие для которого отобразить кнопки (self::CRUD_LIST|self::CRUD_VIEW)
     */

    public $action;

    /**
     * @var \common\db\ActiveRecord модель
     */

    public $model;

    /**
     * @var array массив дополнительных параметров для url
     */

    public $urlParams = [];

    /**
     * @inheritdoc
     */

    /**
     * @var string базовая часть маршрута к действиям
     */
    protected  $_baseRoute;
    /**
     * @return string
     */
    public function getBaseRoute()
    {

        if($this->_baseRoute === null)
            $this->_baseRoute = "/" . $this->view->context->uniqueId;

        return $this->_baseRoute;
    }

    public function run()
    {

        $buttons = $this->getButtons()[$this->action];

        $html = '';

        foreach ($buttons AS $button) {

            if (Yii::$app->user->can($button['permission'], ['model' => $this->model]))
                $html .= Html::a($button["label"], $button["url"], $button["options"]) . "\n";

        }

        return $html;

    }

    /**
     * Возвращает описание ссылок !Yii::$app->user->can($this->baseRoute . '/update', ['model'=>$model])
     * @return array
     */

    public function getButtons()
    {

        return $buttons = [

            self::CRUD_LIST => [

                [
                    'label' => Yii::t('core', 'Create'),
                    'url' => array_merge(['create'], $this->urlParams),
                    'options' => ['class' => 'btn btn-success'],
                    'permission' => $this->baseRoute . '/create',
                ]

            ],

            self::CRUD_VIEW => [

                [
                    'label' => Yii::t('core', 'Update'),
                    'url' => array_merge(['update', 'id' => $this->model->id], $this->urlParams),
                    'options' => ['class' => 'btn btn-primary'],
                    'permission' => $this->baseRoute . '/update',
                ],

                [
                    'label' => Yii::t('core', 'Delete'),
                    'url' => array_merge(['delete', 'id' => $this->model->id], $this->urlParams),
                    'options' => ['class' => 'btn btn-danger',
                        'data' => [
                            'confirm' => Yii::t('core', 'Are you sure?'),
                            'method' => 'post',
                        ],
                    ],
                    'permission' => $this->baseRoute . '/delete',
                ],

            ],

        ];

    }

}