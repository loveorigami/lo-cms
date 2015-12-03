<?php
namespace frontend\controllers;

use Yii;

/**
 * Class App
 * Базовый контроллер для публичных модулей сайта
 * @package common\controllers
 * @author Churkin Anton <webadmin87@gmail.com>
 */
class App extends \yii\web\Controller
{
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