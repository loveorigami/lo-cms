<?php
namespace common\rbac;

/**
 * Class BaseRouteTrait
 * Получаем роуты для формирования access rules
 * @package common\rbac
 */
trait AccessRouteTrait
{

    /**
     * @var string базовая часть маршрута к действиям
     */
    protected  $_baseRoute;

    /**
     * @var string полный маршрут
     */
    protected  $_permRoute;


    /**
     * Возвращает базовый роут
     * @return string
     */

    public function getBaseRoute()
    {

        if($this->_baseRoute === null)
            $this->_baseRoute = "/" . $this->view->context->uniqueId;

        return $this->_baseRoute;
    }

    /**
     * Route for permission
     */
    protected function getPermRoute()
    {
        if($this->_permRoute === null)
            $this->_permRoute = '/'.\Yii::$app->controller->route;
        return $this->_permRoute;
    }

}