<?php
namespace backend\models\meta;

use Yii;
use common\db\MetaFields;
use common\models\Page;
use yii\helpers\ArrayHelper;

/**
 * Class PageMeta
 * Мета описание модели страницы
 * @package app\modules\banners\models\meta
 */
class PageMeta extends MetaFields
{
    /**
     * @inheritdoc
     */
    protected function config()
    {
        return [
            "name" => [
                "definition" => [
                    "class" => \common\db\fields\TextField::className(),
                    "title" => Yii::t('common', 'Name'),
                    "showInGrid" => true,
                    "showInFilter" => true,
                    "isRequired" => true,
                    "editInGrid" => false,
                ],
                "params" => [$this->owner, "name"]
            ],
            "slug" => [
                "definition" => [
                    "class" => \common\db\fields\TextField::className(),
                    "title" => Yii::t('common', 'Slug'),
                    "showInGrid" => true,
                    //"showInView" => false,
                    "showInFilter" => true,
                    "isRequired" => false,
                    "editInGrid" => false,
                ],
                "params" => [$this->owner, "slug"]
            ],
            "text" => [
                "definition" => [
                    "class" => \common\db\fields\TextAreaField::className(),
                    "title" => Yii::t('common', 'Text'),
                    "showInGrid" => false,
                    "isRequired" => true,
                ],
                "params" => [$this->owner, "text"]
            ],
        ];
    }
}