<?php
namespace common\modules\love\models;

use Yii;
use lo\core\db\MetaFields;
use yii\helpers\ArrayHelper;

/**
 * Class PageMeta
 * Мета описание модели страницы
 * @package app\modules\banners\models\meta
 */
class AphorismMeta extends MetaFields
{

    /**
     * Возвращает массив для привязки к источнику
     * @return array
     */
    public function getLibs()
    {
        $models = Lib::find()->published()->orderBy(["name" => SORT_ASC])->all();
        return ArrayHelper::map($models, "id", "name");
    }

    /**
     * Возвращает массив для привязки к источнику
     * @return array
     */
    public function getAuts()
    {
        $models = Author::find()->published()->orderBy(["name" => SORT_ASC])->all();
        return ArrayHelper::map($models, "id", "name");
    }

    /**
     * @inheritdoc
     */
    protected function config()
    {
        return [

            "text" => [
                "definition" => [
                    "class" => \lo\core\db\fields\TextAreaField::class,
                    "title" => Yii::t('backend', 'Aphorism'),
                    "showInGrid" => true,
                    "isRequired" => true,
                    "showInFilter" => true,
                ],
                "params" => [$this->owner, "text"]
            ],

            "aut_id" => [
                "definition" => [
                    "class" => \lo\core\db\fields\AjaxOneField::class,
                    "inputClassOptions" => [
                        'loadUrl' => ['author/list'],
                    ],
                    'gridOptions'=>[
                        'loadUrl' => ['author/list'],
                    ],
                    "title" => Yii::t('backend', 'Author'),
                    "showInGrid" => true,
                    "showInExtendedFilter" => false,
                    "isRequired" => false,
                    //"data" => [$this, "getAuts"], // массив всех авторов (см. выше)
                ],
                "params" => [$this->owner, "aut_id", "aut"]
            ],

            "lib_id" => [
                "definition" => [
                    "class" => \lo\core\db\fields\AjaxOneField::class,
                    "inputClassOptions" => [
                        //'modalUrl' => ['lib/create'],
                        'loadUrl' => ['lib/list'],
                    ],
                    'gridOptions'=>[
                        //'class'=>\lo\core\grid\Select2Column::class,
                        //'loadUrl' => ['lib/list'],
                    ],
                    "title" => Yii::t('backend', 'Lib'),
                   // "data" => [$this, "getLibs"], // массив всех источников (см. выше)
                    "showInGrid" => false,
                    "isRequired" => false,
                ],
                "params" => [$this->owner, "lib_id", "lib"] // id и relation getLib
            ],

            "prim_id" => [
                "definition" => [
                    "class" => \lo\core\db\fields\AjaxOneField::class,
                    "inputClassOptions" => [
                        'loadUrl' => ['prim/list'],
                    ],
                    "title" => Yii::t('backend', 'Prim'),
                    "showInGrid" => false,
                    "isRequired" => false,
                ],
                "params" => [$this->owner, "prim_id", "prim"]
            ],

            "prim_str" => [
                "definition" => [
                    "class" => \lo\core\db\fields\TextField::class,
                    "title" => Yii::t('backend', 'Prim'),
                    "showInGrid" => false,
                    "isRequired" => false,
                ],
                "params" => [$this->owner, "prim_str"]
            ],
            "lib_str" => [
                "definition" => [
                    "class" => \lo\core\db\fields\TextField::class,
                    "title" => Yii::t('backend', 'Lib'),
                    "showInGrid" => false,
                    "isRequired" => false,
                ],
                "params" => [$this->owner, "lib_str"]
            ],
            "dop" => [
                "definition" => [
                    "class" => \lo\core\db\fields\TextField::class,
                    "title" => Yii::t('backend', 'Dop'),
                    "showInGrid" => false,
                    "isRequired" => false,
                ],
                "params" => [$this->owner, "dop"]
            ],
            "hash" => [
                "definition" => [
                    "class" => \lo\core\db\fields\HashField::class,
                    "inputClassOptions" => [
                        'options' => ['readonly'=>true],
                    ],
                    "title" => Yii::t('backend', 'Hash'),
                    "showInGrid" => true,
                    "isRequired" => false,
                ],
                "params" => [$this->owner, "hash"]
            ],
        ];
    }
}