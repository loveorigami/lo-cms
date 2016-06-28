<?php

namespace common\modules\love\models;

use Yii;
use lo\modules\import\models\ICsvImportable;


/**
 * This is the model class.
 *
 * @property integer $id
 */
class Lib extends \lo\core\db\ActiveRecord implements ICsvImportable
{

    use \lo\core\rbac\ConstraintTrait;

    const STATUS_DRAFT = 0;
    const STATUS_PUBLISHED = 1;

    public $tplDir = '@lo/modules/love/modules/admin/views/lib/tpl/';

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%love__lib}}';
    }

    /**
     * @inheritdoc
     */
    public function metaClass()
    {
        return LibMeta::class;
    }

    /**
     * Возвращает массив атрибутов доступных для импорта из csv
     * @return array
     */
    public function getCsvAttributes()
    {
        $attrs = array_keys($this->getAttributes( null, ['updated_at', 'updater_id', 'author_id', 'created_at'])); // пропустить
       // $attrs[] = "id";
        //$attrs[] = "confirm_password";
        return $attrs;

    }

    public function getCsvCallbacks(){
        return  [
            'status' => 'cbStatus',
            'img' => 'cbImage'
        ];
    }

    public function cbStatus($val){
        return $val==1 ? 0 : 1;
    }

    public function cbImage($val){
        if(!$val or $val == 'nety.jpg') $val = 'none.jpg';
        return '/love/lib/'.$val;
    }
}
