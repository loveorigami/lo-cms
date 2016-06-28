<?php
namespace common\modules\love\models;

use Yii;
use lo\core\db\MetaFields;


/**
 * Class Meta
 * Мета описание модели
 */
class LibMeta extends MetaFields
{

    /**
     * @inheritdoc
     */
    protected function config()
    {
        return [
            "img" => [
                "definition" => [
                    "class" => \lo\core\db\fields\ElfImgField::class,
                    "inputClassOptions" => [
                        "widgetOptions"=>[
                            'path'=>'love/lib'
                        ],
                    ],
                    "initValue"=>"/love/lib/none.jpg",
                    "title" => Yii::t('common', 'Image'),
                ],
                "params" => [$this->owner, "img"]
            ],
            "name" => [
                "definition" => [
                    "class" => \lo\core\db\fields\TextField::class,
                    "title" => Yii::t('common', 'Name'),
                    "showInGrid" => true,
                    "showInFilter" => true,
                    "isRequired" => true,
                    "editInGrid" => true,
                ],
                "params" => [$this->owner, "name"]
            ],
            "fullname" => [
                "definition" => [
                    "class" => \lo\core\db\fields\TextField::class,
                    "title" => Yii::t('common', 'Fullname'),
                    "showInGrid" => true,
                    "showInFilter" => true,
                    "isRequired" => false,
                ],
                "params" => [$this->owner, "fullname"]
            ],
            "link" => [
                "definition" => [
                    "class" => \lo\core\db\fields\TextField::class,
                    "title" => Yii::t('common', 'Link'),
                    "showInGrid" => false,
                    "showInFilter" => true,
                    "isRequired" => false,
                ],
                "params" => [$this->owner, "link"]
            ],
            "text" => [
                "definition" => [
                    "class" => \lo\core\db\fields\HtmlField::class,
                    "inputClass" =>[
                        'class'=>'lo\core\inputs\HtmlInput',
                        "fileManagerController"=>['elfinder', 'path' => 'love/lib'],
                    ],
                    "inputClassOptions" => [
                        "widgetOptions"=>[
                            'editorOptions'=>[
                                //'preset' => 'basic',
                            ]
                        ],
                    ],
                    "title" => Yii::t('common', 'Text'),
                    "showInGrid" => false,
                    "isRequired" => false,
                ],
                "params" => [$this->owner, "text"]
            ],
        ];
    }
}