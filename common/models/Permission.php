<?php
namespace common\models;

use common\db\ActiveRecord;
use common\rbac\IPermission;
use Yii;

/**
 * Class Permission
 * Модель прав доступа
 * @package app\modules\main\models
 * @author Churkin Anton <webadmin87@gmail.com>
 */
class Permission extends ActiveRecord implements IPermission
{

    /**
     * @var Permission[]
     */

    protected static $_permissions = array();
    /**
     * @var \common\rbac\IConstraint объект ограничения доступа
     */

    protected $_constraintObject;
    /**
     * @var array массив атрибутов запрещенных к редактированию
     */

    protected $_forbiddenAttrs;

    /**
     * Возвращает объект прав доступа для модели с заданным классом
     * @param string $class класс модели
     * @return Permission
     */

    public static function findPermission($class)
    {

        if (substr($class, 0, 1) != '\\')
            $class = '\\' . $class;

        if (!isset(self::$_permissions[$class])) {

            $roles=Yii::$app->authManager->getRolesByUser(Yii::$app->user->getId());
            $role = key($roles);
            //var_dump($role);
            self::$_permissions[$class] = static::find()->where(["model" => $class, "role" =>$role])->published()->one();
        }

        return self::$_permissions[$class];

    }

    /**
     * @inheritdoc
     */

    public static function tableName()
    {
        return "{{%permission}}";
    }

    /**
     * @inheritdoc
     */
    public function metaClass()
    {
        return meta\PermissionMeta::className();
    }

    /**
     * Создание модели
     * @param \common\db\ActiveRecord $model модель
     * @return bool
     */

    public function createModel($model)
    {

        if(empty($this->create))
            return false;

        $constraint = $this->getConstraintObject();

        return $constraint === null OR $constraint->create($model);

    }

    /**
     * Возвращает объект ограничения доступа
     * @return \common\rbac\IConstraint
     * @throws \yii\base\InvalidConfigException
     */

    public function getConstraintObject()
    {

        if ($this->_constraintObject === null AND !empty($this->constraint)) {

            $this->_constraintObject = Yii::createObject($this->constraint);

        }

        return $this->_constraintObject;

    }


    /**
     * Применяет ограничение к запрос
     * @param \common\db\ActiveQuery $query запрос
     */

    public function applyConstraint($query)
    {

        $constraint = $this->getConstraintObject();

        if ($constraint)
            $constraint->applyConstraint($query);

    }

    /**
     * Является ди атрибут запрещенным к редактированию
     * @param string $attr атрибут
     * @return bool
     */

    public function isAttributeForbidden($attr)
    {

        $arr = $this->getForbiddenAttrs();

        return in_array($attr, $arr);
    }

    /**
     * Возвращает массив имен атрибутов запрещенных к редактировнаию
     * @return array
     */

    public function getForbiddenAttrs()
    {

        if ($this->_forbiddenAttrs === null) {

            $arr = [];

            $strs = explode("\n", $this->forbidden_attrs);

            foreach ($strs AS $str) {

                $str = trim($str);

                if (!empty($str))
                    $arr[] = $str;

            }

            $this->_forbiddenAttrs = $arr;

        }

        return $this->_forbiddenAttrs;

    }

    /**
     * Присутствуют ли в массиве атрибутов запрещенные к изменению
     * @param array $attrs массив атрибутов key=>value
     * @return bool
     */

    public function hasForbiddenAttrs($attrs)
    {

        $arr = $this->getForbiddenAttrs();

        $keys = array_keys($attrs);

        $inter = array_intersect($keys, $arr);

        return count($inter) > 0;
    }

}