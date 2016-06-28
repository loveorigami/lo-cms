<?php
namespace common\modules\love\models;

use Yii;
use lo\core\db\MetaFields;


/**
 * Class Meta
 * Мета описание модели
 */
class CategoryMeta extends MetaFields
{
    /**
     * @inheritdoc
     */
    const SEO_TAB = "seo";

    /**
     * @inheritdoc
     */

    public function tabs()
    {
        $tabs = parent::tabs();
        $tabs[self::SEO_TAB] = Yii::t('backend', "SEO");
        return $tabs;
    }

    /**
     * @inheritdoc
     */
    protected function config()
    {
        return [
            "parent_id" => [
                "definition" => [
                    "class" => \lo\core\db\fields\ParentListField::class,
                    "title" => Yii::t('backend', 'Parent'),
                    "data" => [$this->owner, "getListTreeData"],
                ],
                "params" => [$this->owner, "parent_id"]
            ],
            "img" => [
                "definition" => [
                    "class" => \lo\core\db\fields\ElfImgField::class,
                    "inputClassOptions" => [
                        "widgetOptions"=>[
                            'path'=>'love/cat'
                        ],
                    ],
                    "initValue"=>"/love/cat/none.jpg",
                    "title" => Yii::t('backend', 'Image'),
                ],
                "params" => [$this->owner, "img"]
            ],
            "name" => [
                "definition" => [
                    "class" => \lo\core\db\fields\TextField::class,
                    "title" => Yii::t('backend', 'Name'),
                    "showInGrid" => true,
                    "showInFilter" => true,
                    "isRequired" => true,
                    "editInGrid" => true,
                ],
                "params" => [$this->owner, "name"]
            ],
            "slug" => [
                "definition" => [
                    "class" => \lo\core\db\fields\SlugField::class,
                    "title" => Yii::t('common', 'Slug'),
                    "showInGrid" => true,
                    "generateFrom" => "name",
                ],
                "params" => [$this->owner, "slug"]
            ],

            "intro" => [
                "definition" => [
                    "class" => \lo\core\db\fields\TextAreaField::class,
                    "title" => Yii::t('backend', 'Intro'),
                    "showInGrid" => true,
                    "isRequired" => false,
                ],
                "params" => [$this->owner, "intro"]
            ],
            "intro2" => [
                "definition" => [
                    "class" => \lo\core\db\fields\TextAreaField::class,
                    "title" => Yii::t('backend', 'Text'),
                    "showInGrid" => false,
                    "isRequired" => false,
                ],
                "params" => [$this->owner, "intro2"]
            ],

            "total_hits" => [
                "definition" => [
                    "class" => \lo\core\db\fields\NumberField::class,
                    "title" => Yii::t('backend', 'Total hits'),
                    "showInGrid" => true,
                    "isRequired" => false,
                ],
                "params" => [$this->owner, "total_hits"]
            ],
            "title" => [
                "definition" => [
                    "class" => \lo\core\db\fields\TextField::class,
                    "title" => Yii::t('common', 'title'),
                    "showInGrid" => false,
                    "isRequired" => false,
                    "tab" => self::SEO_TAB,
                ],
                "params" => [$this->owner, "title"]
            ],
            "description" => [
                "definition" => [
                    "class" => \lo\core\db\fields\TextAreaField::class,
                    "title" => Yii::t('common', 'description'),
                    "showInGrid" => false,
                    "isRequired" => false,
                    "tab" => self::SEO_TAB,
                ],
                "params" => [$this->owner, "description"]
            ],
            "keywords" => [
                "definition" => [
                    "class" => \lo\core\db\fields\TextField::class,
                    "title" => Yii::t('common', 'keywords'),
                    "showInGrid" => false,
                    "isRequired" => false,
                    "tab" => self::SEO_TAB,
                ],
                "params" => [$this->owner, "keywords"]
            ],
        ];
    }
}