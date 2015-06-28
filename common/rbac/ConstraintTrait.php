<?php
namespace common\rbac;

use common\models\Constraint;

/**
 * Class PermissionTrait
 * Предоставляет функциональность по проверке прав доступа
 * @package common\rbac
 */
trait ConstraintTrait
{
    /**
     * Возвращает модель правил доступа
     * @return Permission
     */

    public function getPermission()
    {
        return Constraint::findPermission(get_class($this));
    }

}