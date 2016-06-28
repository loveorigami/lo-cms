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
class ParserMeta extends MetaFields
{
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
            "aut_id" => [
                "definition" => [
                    "class" => \lo\core\db\fields\AjaxOneField::class,
                    "inputClassOptions" => [
                        //'modalUrl' => ['author/create'],
                        'loadUrl' => ['author/list'],
                    ],
                    "title" => Yii::t('backend', 'Author'),
                    "showInGrid" => true,
                    "showInExtendedFilter" => false,
                    "isRequired" => false,
                    "data" => [$this, "getAuts"], // массив всех авторов (см. выше)
                ],
                "params" => [$this->owner, "aut_id", "aut"]
            ],
            "dop" => [
                "definition" => [
                    "class" => \lo\core\db\fields\ElfImgField::class,
                    "inputClassOptions" => [
                        "widgetOptions"=>[
                            'path'=>'love/aph'
                        ],
                    ],
                    "title" => Yii::t('backend', 'Image'),
                ],
                "params" => [$this->owner, "dop"]
            ],

        ];
    }
}