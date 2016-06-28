<?php

namespace common\modules\love\models;

use Yii;


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
class Author extends \lo\core\db\ActiveRecord
{

    use \lo\core\rbac\ConstraintTrait;

    const STATUS_DRAFT = 0;
    const STATUS_PUBLISHED = 1;

    public $tplDir = '@lo/modules/love/modules/admin/views/author/tpl/';

    /**
     * @var array массив идентификаторов связанных категорий
     */
    protected $_categoriesIds;

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
            'class' => \lo\core\behaviors\ManyManySaver::class,
            'names' => ['categories'],
        ];
        return $arr;
    }

    /**
     * Получение идентификаторов связанных категорий
     * @return array
     */
    public function getCategoriesIds()
    {
        if (!is_array($this->_categoriesIds) AND !$this->isNewRecord) {
            $this->_categoriesIds = $this->getManyManyIds("categories");
        }

        return $this->_categoriesIds;
    }

    /**
     * Установка идентификаторов связанных категорий
     * @param array $categoriesIds
     */
    public function setCategoriesIds($categoriesIds)
    {
        $this->_categoriesIds = $categoriesIds;
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
