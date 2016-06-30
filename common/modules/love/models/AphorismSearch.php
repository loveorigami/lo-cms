<?php

namespace common\modules\love\models;

use Yii;
use yii\db\Expression;
use yii\data\ActiveDataProvider;
use yii\helpers\ArrayHelper;
use lo\modules\vote\models\AggregateRating;
use lo\modules\vote\models\Favorites;

/**
 * Class AphorismSearch
 * Модель для фильтрации афоризмов
 * @package lo\core\modules\love\models
 * @author Lukyanov Andrey <loveorigami@mail.ru>
 */
class AphorismSearch extends Aphorism
{
    public $options = ['ucp' => false];

    public function attributeLabels()
    {
        return [
            'author' => 'Автор',
            'aggregate_rating' => 'Рейтинг',
            'favorites' => 'Избранное',
            'date' => 'Дата'
        ];
    }

    /**
     * Возвращает провайдер данных
     * @return ActiveDataProvider
     */
    public function publicSearch($params, $options = [])
    {
        $options = ArrayHelper::merge($this->options, $options);

        $query = $this->find();
        $query->modelClass = get_parent_class($this);

        $query->innerJoinWith([
            'aut' => function ($q) use ($params) {
                $q->andFilterWhere([Author::tableName() . '.slug' => $params['slug']]);
                $q->innerJoinWith([
                    'categories' => function ($q) use ($params) {
                        $q->andFilterWhere([Category::tableName() . '.slug' => $params['cat']]);
                        $q->published();
                    }
                ])->published();

            },
        ])->joinWith('aggregate');

        // user panel ?
        ($options['ucp']) ? $query->innerJoinWith('faved') : $query->joinWith('faved');

        $query->groupBy(['id'])->published();

        $dataProvider = Yii::createObject([
            'class' => ActiveDataProvider::class,
            "query" => $query,
        ]);

        $dataProvider->sort->attributes['author'] = [
            'asc' => [Author::tableName() . '.name' => SORT_ASC],
            'desc' => [Author::tableName() . '.name' => SORT_DESC],
            'label' => $this->getAttributeLabel('author'),
        ];

        $dataProvider->sort->attributes['aggregate_rating'] = [
            'asc' => [AggregateRating::tableName() . '.rating' => SORT_ASC],
            'desc' => [AggregateRating::tableName() . '.rating' => SORT_DESC],
            'label' => $this->getAttributeLabel('aggregate_rating'),
            'default' => SORT_DESC
        ];

        $dataProvider->sort->attributes['favorites'] = [
            'desc' => [AggregateRating::tableName() . '.favs' => SORT_DESC],
            'asc' => [AggregateRating::tableName() . '.favs' => SORT_ASC],
            'label' => $this->getAttributeLabel('favorites'),
            'default' => SORT_DESC
        ];

        if (($options['ucp'])) {
            $dataProvider->sort->attributes['date'] = [
                'desc' => ['f.updated_at' => SORT_DESC],
                'asc' => ['f.updated_at' => SORT_ASC],
                'label' => $this->getAttributeLabel('date'),
                'default' => SORT_DESC
            ];
        } else{
            $dataProvider->sort->attributes['date'] = [
                'desc' => [Aphorism::tableName().'.updated_at' => SORT_DESC],
                'asc' => [Aphorism::tableName().'.updated_at' => SORT_ASC],
                'label' => $this->getAttributeLabel('date'),
                'default' => SORT_DESC
            ];
        }


        // No search? Then return data Provider
        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        foreach ($this->metaFields->fields as $field) {
            $field->applySearch($query);
        }

        /*        $dependency = new \yii\caching\DbDependency([
                    'sql' => 'SELECT MAX(updated_at) FROM url'
                ]);

                \Yii::$app->db->cache(function() use ($dataProvider) {

                    $dataProvider->prepare();

                }, \Yii::$app->params['cacheExpire'], $dependency);*/

        return $dataProvider;
    }
}
