<?php

namespace common\modules\love\models;

use lo\core\db\ActiveRecord;
use lo\core\rbac\ConstraintTrait;
use lo\core\behaviors\ManyManySaver;


/**
 * This is the model class for table "page".
 *
 * @property integer $id
 * @property string $slug
 * @property string $title
 * @property string $body
 * @property string $view
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 */
class Author extends ActiveRecord
{

    use ConstraintTrait;

    const STATUS_DRAFT = 0;
    const STATUS_PUBLISHED = 1;

    public $tplDir = '@lo/modules/love/modules/admin/views/author/tpl/';

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%love__author}}';
    }

    /**
     * @inheritdoc
     */
    public function metaClass()
    {
        return AuthorMeta::class;
    }

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        $arr = parent::behaviors();

        $arr["manyManySaver"] = [
            'class' => ManyManySaver::class,
            'names' => ['categories'],
        ];
        return $arr;
    }

    /**
     * Связь с категориями
     * @return \yii\db\ActiveQueryInterface
     */
    public function getCategories()
    {
        return $this->hasMany(Category::class, ['id' => 'cat_id'])->viaTable('{{%love__author_cat}}', ['aut_id' => 'id']);
    }

    /**
     * Связь с афоризмами
     * @return \yii\db\ActiveQueryInterface
     */
    public function getAphs()
    {
        return $this->hasMany(Aphorism::class, ['aut_id' => 'id']);
    }

}
