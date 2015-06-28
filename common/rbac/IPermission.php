<?php
namespace common\rbac;

/**
 * Interface IPermission
 * Интерфейс проверки прав доступа
 * @package common\rbac
 * @author Churkin Anton <webadmin87@gmail.com>
 */

interface IPermission
{

    public function applyConstraint($query);

    /**
     * Возвращает массив имен атрибутов запрещенных к редактировнаию
     * @return array
     */

    public function getForbiddenAttrs();

    /**
     * Является ди атрибут запрещенным к редактированию
     * @param string $attr атрибут
     * @return bool
     */

    public function isAttributeForbidden($attr);

    /**
     * Присутствуют ли в массиве атрибутов запрещенные к изменению
     * @param array $attrs массив атрибутов key=>value
     * @return bool
     */

    public function hasForbiddenAttrs($attrs);

}