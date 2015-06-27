<?php
namespace common\rbac;

use common\models\Permission;

/**
 * Class PermissionTrait
 * Предоставляет функциональность по проверке прав доступа
 * @package common\rbac
 */
trait PermissionTrait
{
    /**
     * Возвращает модель правил доступа
     * @return Permission
     */

    public function getPermission()
    {
        return Permission::findPermission(get_class($this));
    }

}