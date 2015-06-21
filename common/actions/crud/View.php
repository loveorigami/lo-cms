<?php
namespace common\actions\crud;

use Yii;
use yii\web\ForbiddenHttpException;
use yii\web\NotFoundHttpException;

/**
 * Class View
 * Класс действия просмотра модели
 * @package common\actions\crud
 * @author Churkin Anton <webadmin87@gmail.com>
 */
class View extends \common\actions\Base
{

    /**
     * @var string путь к шаблону для отображения
     */

    public $tpl = "view";

    /**
     * Запуск действия просмотра модели
     * @param integer $id идентификатор модели
     * @return string
     * @throws \yii\web\NotFoundHttpException
     * @throws \yii\web\ForbiddenHttpException
     */

    public function run($id)
    {

        $model = $this->findModel($id);

        if (!$model)
            throw new NotFoundHttpException('Not found');

        if (!Yii::$app->user->can($this->permRoute(), array("model" => $model)))
            throw new ForbiddenHttpException('Forbidden model');

        return $this->render($this->tpl, ["model" => $model]);

    }

}