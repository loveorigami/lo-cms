<?php
namespace frontend\events;

use Yii;

/**
 * Class App
 * Базовый контроллер для публичных модулей сайта
 * @package common\controllers
 * @author Churkin Anton <webadmin87@gmail.com>
 */
class AppLayout extends \yii\base\Behavior
{
    /**
     * @var string класс модели шаблонов
     */

    public $templateClass = "\\lo\\modules\\core\\models\\Template";

    public function events(){
        return [
            \yii\web\Controller::EVENT_BEFORE_ACTION => 'setLayout',
        ];
    }

    public function setLayout()
    {
        list ($route, $params) = Yii::$app->getRequest()->resolve();
        if ($route === 'debug/default/view') return;

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

        foreach ($models as $model) {
            if ($model->isSuitable()) {
                Yii::$app->controller->layout = $model->layout;
                return;
            }
        }
    }

}