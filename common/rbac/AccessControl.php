<?php

namespace common\rbac;

use Yii;
use yii\web\User;


/**
 * Access Control Filter (ACF) is a simple authorization method that is best used by applications that only need some simple access control. 
 * As its name indicates, ACF is an action filter that can be attached to a controller or a module as a behavior. 
 * ACF will check a set of access rules to make sure the current user can access the requested action.
 *
 * To use AccessControl, declare it in the application config as behavior.
 * For example.
 *
 * ~~~
 * 'as access' => [
 *     'class' => 'mdm\admin\components\AccessControl',
 *     'allowActions' => ['site/login', 'site/error']
 * ]
 * ~~~
 *
 * @property User $user
 * 
 * @author Misbahul D Munir <misbahuldmunir@gmail.com>
 * @since 1.0
 */

class AccessControl extends \mdm\admin\components\AccessControl
{
    /**
     * @var array List of action that not need to check access.
     */
    public $allowOwnActions = [];


    /**
     * @inheritdoc
     */
    public function beforeAction($action)
    {
        $actionId = $action->getUniqueId();
        $user = $this->getUser();

        // allow for update, view, delete actions with Own rule
        if (in_array($action->id, $this->allowOwnActions)){
            return true;
        }

        if ($user->can('/' . $actionId)) {
            return true;
        }

        $obj = $action->controller;
        do {
            if ($user->can('/' . ltrim($obj->getUniqueId() . '/*', '/'))) {
                return true;
            }
            $obj = $obj->module;
        } while ($obj !== null);
        $this->denyAccess($user);
    }

}