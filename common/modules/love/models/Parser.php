<?php

namespace common\modules\love\models;

use Yii;

class Parser extends \lo\core\db\ActiveRecord
{

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%love__aph}}';
    }

    /**
     * @inheritdoc
     */
    public function metaClass()
    {
        return ParserMeta::class;
    }

    public function getAut()
    {
        return $this->hasOne(Author::class, ['id' => 'aut_id']);
    }

}
