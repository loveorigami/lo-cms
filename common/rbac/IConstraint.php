<?php
namespace common\rbac;

/**
 * Interface IConstraint
 * Интерфейс для создания правил ограничений прав доступа
 * @package common\rbac
 * @author Churkin Anton <webadmin87@gmail.com>
 */

interface IConstraint
{

    /**
     * Устанавливает ограничение на критерий запроса
     * @param \common\db\ActiveQuery $query запрос
     * @return mixed
     */

    public function applyConstraint($query);

    /**
     * Проверка возможности создания модели
     * @param \common\db\ActiveRecord $model
     * @return boolean
     */

}