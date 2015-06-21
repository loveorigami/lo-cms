<?php

namespace common\models;

use Yii;
use yii\behaviors\SluggableBehavior;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;

use common\models\meta\PageMeta;

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
class Page extends \common\db\ActiveRecord
{
    const STATUS_DRAFT = 0;
    const STATUS_PUBLISHED = 1;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%page}}';
    }

    /**
     * @inheritdoc
     */
    public function metaClass()
    {
        return PageMeta::className();
    }

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
            'slug'=>[
                'class'=>SluggableBehavior::className(),
                'attribute'=>'name',
                'ensureUnique'=>true,
                'immutable'=>true
            ],
            [
                'class' => BlameableBehavior::className(),
                'createdByAttribute' => 'author_id',
                'updatedByAttribute' => 'updater_id',
            ],
        ];
    }

    /**
     * @inheritdoc

    public function rules()
    {
        return [
            [['name', 'text'], 'required'],
            [['text'], 'string'],
            [['status'], 'integer'],
            [['slug'], 'unique'],
            [['slug'], 'string', 'max' => 2048],
            [['name'], 'string', 'max' => 512],
        ];
    }
*/
    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('common', 'ID'),
            'slug' => Yii::t('common', 'Slug'),
            'name' => Yii::t('common', 'Name'),
            'text' => Yii::t('common', 'Text'),
            'status' => Yii::t('common', 'Active'),
            'created_at' => Yii::t('common', 'Created At'),
            'updated_at' => Yii::t('common', 'Updated At'),
        ];
    }
}
