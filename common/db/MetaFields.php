<?php
namespace common\db;

use common\db\fields;
use Yii;
use yii\base\Object;
use yii\helpers\ArrayHelper;

/**
 * Class MetaFields
 * Класс содержащий описание полей модели
 * @package common\db
 * @author Churkin Anton <webadmin87@gmail.com>
 */
abstract class MetaFields extends Object
{
    /**
     * Вкладка формы по умолчанию
     */
    const DEFAULT_TAB = "default";

    /**
     * @var ActiveRecord модель - владелец
     */

    protected $owner;
    /**
     * @var array массив объектов полей модели
     */

    protected $_fields;

    /**
     * Конструктор
     * @param ActiveRecord $owner
     */
    public function __construct(ActiveRecord $owner, $params = array())
    {
        $this->owner = $owner;
        parent::__construct($params);
    }

    /**
     * Возвращает поля по коду вкладки
     * @param string $tab код вкладки
     * @return \common\db\fields\Field[]
     */
    public function getFieldsByTab($tab)
    {
        $fields = $this->getFields();
        $arr = [];
        foreach ($fields AS $field) {
            if ($field->tab == $tab AND $field->showInForm)
                $arr[] = $field;
        }
        return $arr;
    }

    /**
     * Возвращает массив объектов полей модели
     * @return \common\db\fields\Field[]
     */
    public function getFields()
    {
        if ($this->_fields === null) {
            $this->_fields = [];
            $config = ArrayHelper::merge($this->defaultConfig(), $this->config());
            foreach ($config AS $config) {
                if (!is_array($config))
                    continue;
                if (isset($config["definition"])){
                    $this->_fields[] = Yii::createObject($config["definition"], $config["params"]);
                }
            }
        }
        return $this->_fields;
    }

    /**
     * Конфигурация полей по умолчанию
     * @return array
     */
    protected function defaultConfig()
    {
        return [
            "id" => [
                'definition' => [
                    "class" => fields\PkField::className(),
                    "title" => "ID",
                ],
                "params" => [$this->owner, "id"]
            ],
            "name"=>[],
            "slug"=>[],
            "author_id" => [
                'definition' => [
                    "class" => fields\HasOneField::className(),
                    "title" => Yii::t('core', 'Author'),
                    "showInForm" => true,
                    "showInGrid" => Yii::$app->user->can('editor'),
                    "data" => [$this, "getAuthorsList"],
                    "gridAttr" => "username",
                ],
                "params" => [$this->owner, "author_id", "author"]
            ],
            "created_at" => [
                'definition' => [
                    "class" => fields\TimestampField::className(),
                    "title" => Yii::t('core', 'Created'),
                    "showInGrid" => true,
                    "showInFilter" => false,
                    "filterInputClass" => [
                        "class" => \common\inputs\DateRangeInput::className(),
                        "fromAttr" => "createdAtFrom",
                        "toAttr" => "createdAtTo",
                    ],
                    "widgetOptions" =>['dateFormat' => 'yyyy-MM-dd'],
                    "queryModifier" => [$this, "createdAtQueryModifier"],
                ],
                "params" => [$this->owner, "created_at"]
            ],
            "updated_at" => [
                'definition' => [
                    "class" => fields\TimestampField::className(),
                    "title" => Yii::t('core', 'Updated'),
                    "showInExtendedFilter" => false,
                ],
                "params" => [$this->owner, "updated_at"]
            ],
            "status" => [
                "definition" => [
                    "class" => fields\CheckBoxField::className(),
                    "title" => Yii::t('core', 'Status'),
                    "editInGrid" => true,
                    "initValue" => true,
                ],
                "params" => [$this->owner, "status"]
            ],
        ];
    }

    /**
     * Поиск по диапазону дат создания
     * @param \yii\db\ActiveQuery $q
     * @param \common\db\fields\Field $f
     */
    public function createdAtQueryModifier($q, $f)
    {
        $table = $f->model->tableName();
        $attr = $f->attr;


        if($f->model->createdAtFrom){
            $q->andFilterWhere([">=", "$table.$attr", strtotime($f->model->createdAtFrom)]);
        }

        if($f->model->createdAtTo){
            $q->andFilterWhere(["<=", "$table.$attr", strtotime($f->model->createdAtTo)]);
        }

    }

    /**
     * Возвращает список авторов
     * @return array
     * @throws \yii\base\InvalidConfigException
     */
    public function getAuthorsList()
    {
        $authorQuery = Yii::createObject(\yii\db\Query::className());
        $authorCommand = $authorQuery->select('id, username')->from(Yii::$app->getDb()->tablePrefix.'user')->createCommand();
        $authors = $authorCommand->queryAll();
        return ArrayHelper::map($authors, 'id', 'username');
    }

    /**
     * Данный метод должен возвращать массив конфигураций объектов для создания полей модели
     * через Yii::createObject()
     *
     * Пример конфигурации:
     *
     * return [
     *
     *      "title"=>[
     *                  "definition"=>[
     *                      "class"=>\common\db\fields\TextField::className(),
     *                      "title"=>"Название",
     *                  ],
     *                  "params"=>[$this->owner, "title"]
     *              ],
     * ];
     *
     * @return array
     */
    abstract protected function config();

    /**
     * Массив вкладок формы редактирования модели (key=>name)
     * @return array
     */
    public function tabs()
    {
        return [self::DEFAULT_TAB => Yii::t('core', 'Element')];
    }
}