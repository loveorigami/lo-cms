<?php

namespace common\modules\love\models;

use Yii;
//use lo\modules\vote\models\AggregateRating;


/**
 * This is the model class for table "page".
 *
 * @property integer $id
 * @property string $slug
 * @property string $name
 * @property string $text
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 */
class Story extends \lo\core\db\ActiveRecord
{

    use \lo\core\rbac\ConstraintTrait;

    const STATUS_DRAFT = 0;
    const STATUS_PUBLISHED = 1;

    public $tplDir = '@lo/modules/love/modules/admin/views/story/tpl/';

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%love__story}}';
    }

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        $arr = parent::behaviors();

        $arr["vote"] = [
            'class' => \lo\modules\vote\behaviors\RatingBehavior::class,
        ];

        return $arr;
    }

    /**
     * @inheritdoc
     */
    public function metaClass()
    {
        return StoryMeta::class;
    }
   
    public function getLib()
    {
        return $this->hasOne(Lib::class, ['id' => 'lib_id']);
    }

    public function getAut()
    {
        return $this->hasOne(Author::class, ['id' => 'aut_id']);
    }

    public function getAut2()
    {
        return $this->hasOne(Author::class, ['id' => 'aut2_id']);
    }
    
}
