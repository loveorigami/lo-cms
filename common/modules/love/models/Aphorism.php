<?php

namespace common\modules\love\models;

use lo\modules\vote\behaviors\RatingBehavior;
use lo\core\db\ActiveRecord;
use lo\core\rbac\ConstraintTrait;


/**
 * This is the model class for table "love__aph".
 *
 * @property integer $id
 * @property string $slug
 * @property string $name
 * @property string $text
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 */
class Aphorism extends ActiveRecord
{

    use ConstraintTrait;

    const STATUS_DRAFT = 0;
    const STATUS_PUBLISHED = 1;

    public $tplDir = '@common/modules/love/modules/admin/views/aphorism/tpl/';
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
    public function behaviors()
    {
        $arr = parent::behaviors();

        $arr["vote"] = [
            'class' => RatingBehavior::class,
        ];
        return $arr;
    }

    /**
     * @inheritdoc
     */
    public function metaClass()
    {
        return AphorismMeta::class;
    }

    public function getLib()
    {
        return $this->hasOne(Lib::class, ['id' => 'lib_id']);
    }

    public function getAut()
    {
        return $this->hasOne(Author::class, ['id' => 'aut_id']);
    }

    public function getPrim()
    {
        return $this->hasOne(Prim::class, ['id' => 'prim_id']);
    }

}
