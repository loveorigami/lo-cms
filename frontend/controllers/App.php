<?php
namespace frontend\controllers;

use Yii;
use yii\web\Controller;

/**
 * Class App
 * Базовый контроллер для публичных модулей сайта
 * @package common\controllers
 * @author Churkin Anton <webadmin87@gmail.com>
 */
class App extends Controller
{

    /**
     * @var string класс модели шаблонов
     */

    public $templateClass = "\\lo\\modules\\core\\models\\Template";

    /**
     * @inheritdoc
     */

    public function init()
    {
        if (!Yii::$app->request->isAjax) {
            $this->initLayout();
        }
    }

    /**
     * Инициализирует шаблон
     */

    public function initLayout()
    {

        $class = $this->templateClass;
        $models = $class::find()->published()->orderBy(['pos' => SORT_ASC])->all();

        foreach ($models As $model) {
            if ($model->isSuitable()) {
                $this->layout = $model->code;
                Yii::$app->view->theme->active = $model->name;
                return;
            }
        }
    }

    /**
     * Рендерит html код, оборачивая в layout
     * @param string $output html код
     * @return string
     */

    public function renderHtml($output)
    {
        $layoutFile = $this->findLayoutFile($this->getView());
        if ($layoutFile !== false) {
            return $this->getView()->renderFile($layoutFile, ['content' => $output], $this);
        } else {
            return $output;
        }
    }

    /**
     * Возвращает идентификатор кеше для действия контроллера
     * @param string $id базовый идентификатор кеша
     * @return array
     */
    public function getActionCacheId($id)
    {
        return [$id, Yii::$app->request->url];
    }

}