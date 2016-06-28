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
class StoryMeta extends MetaFields
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
     * @inheritdoc
     */
    protected function config()
    {
        return [
            "img" => [
                "definition" => [
                    "class" => \lo\core\db\fields\ElfImgField::class,
                    "initValue"=>"",
                    "inputClassOptions" => [
                        "widgetOptions"=>[
                            'path'=>'love/story'
                        ],
                    ],
                    "title" => Yii::t('backend', 'Image'),
                ],
                "params" => [$this->owner, "img"]
            ],

            "name" => [
                "definition" => [
                    "class" => \lo\core\db\fields\TextField::class,
                    "title" => Yii::t('backend', 'Name'),
                    "showInGrid" => true,
                    "isRequired" => true,
                ],
                "params" => [$this->owner, "name"]
            ],

            "slug" => [
                "definition" => [
                    "class" => \lo\core\db\fields\SlugField::class,
                    "title" => Yii::t('backend', 'Slug'),
                    "showInGrid" => false,
                    "generateFrom" => "name",
                ],
                "params" => [$this->owner, "slug"]
            ],

            "text" => [
                "definition" => [
                    "class" => \lo\core\db\fields\HtmlField::class,
                    "inputClass" =>[
                        'class'=>'lo\core\inputs\HtmlInput',
                        'path' => 'love/story',
                    ],
                    "inputClassOptions" => [
                        "widgetOptions"=>[
                            'editorOptions'=>[
                                //'preset' => 'basic',
                            ]
                        ],
                    ],
                    "title" => Yii::t('backend', 'Text'),
                    "showInGrid" => false,
                    "isRequired" => false,
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
                    "isRequired" => true,
                    //"data" => [$this, "getAuts"], // массив всех авторов (см. выше)
                ],
                "params" => [$this->owner, "aut_id", "aut"]
            ],
            
            "aut2_id" => [
                "definition" => [
                    "class" => \lo\core\db\fields\AjaxOneField::class,
                    "inputClassOptions" => [
                        'loadUrl' => ['author/list'],
                    ],
                    'gridOptions'=>[
                        'loadUrl' => ['author/list'],
                    ],
                    "title" => Yii::t('backend', 'Persona'),
                    "showInGrid" => true,
                    "showInExtendedFilter" => false,
                    "isRequired" => false,
                    //"data" => [$this, "getAuts"], // массив всех авторов (см. выше)
                ],
                "params" => [$this->owner, "aut2_id", "aut2"]
            ],
        ];
    }
}