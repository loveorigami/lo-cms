<?php

namespace common\models\meta;

use common\db\MetaFields;
use Yii;

/**
 * Class PermissionMeta
 * Мета описание модели прав доступа
 * @package app\modules\main\models
 * @author Churkin Anton <webadmin87@gmail.com>
 */
class PermissionMeta extends MetaFields
{

    /**
     * @inheritdoc
     */

    protected function config()
    {
        return [
            "role" => [
                "definition" => [
                    "class" => \common\db\fields\ListField::className(),
                    "title" => Yii::t('common', 'Role'),
                    "isRequired" => true,
                    "data" => function () {
                        return \yii\helpers\ArrayHelper::map(Yii::$app->authManager->getRoles(), 'name', 'name');
                    },
                    "editInGrid" => true,
                ],
                "params" => [$this->owner, "role"]
            ],

            "model" => [
                "definition" => [
                    "class" => \common\db\fields\TextField::className(),
                    "title" => Yii::t('core', 'Model class'),
                    "isRequired" => true,
                    "editInGrid" => true,
                ],
                "params" => [$this->owner, "model"]
            ],

            "constraint" => [
                "definition" => [
                    "class" => \common\db\fields\TextField::className(),
                    "title" => Yii::t('core', 'Constraint class'),
                    "editInGrid" => true,
                ],
                "params" => [$this->owner, "constraint"]
            ],

            "forbidden_attrs" => [
                "definition" => [
                    "class" => \common\db\fields\TextAreaField::className(),
                    "title" => Yii::t('core', 'Forbidden attributes'),
                    "editInGrid" => true,
                ],
                "params" => [$this->owner, "forbidden_attrs"]
            ],

        ];
    }

}