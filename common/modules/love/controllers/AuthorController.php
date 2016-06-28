<?php
/**
 * Created by PhpStorm.
 * User: zein
 * Date: 7/4/14
 * Time: 2:01 PM
 */

namespace common\modules\love\controllers;




use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use sjaakp\alphapager\ActiveDataProvider;

use lo\core\db\ActiveRecord;

use lo\core\cache\TagDependency;
use lo\core\cache\CacheHelper;

use common\modules\love\models\Author;
use common\modules\love\models\Aphorism;
use common\modules\love\models\AphorismSearch;

class AuthorController extends Controller
{

    const LIST_CACHE_ID = "love-author-list";

    /**
     * @var array сортировка
     */
    public $orderBy = ["id" => SORT_DESC];

    /**
     * @var int количество новостей на странице
     */
    public $pageSize = 20;

    public function actionIndex(){

        $dataProvider = new ActiveDataProvider([
            'query' => Author::find()->orderBy('name'),
            'alphaAttribute' => 'name',
            'alphaDigits' => ['А', 'Б']
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider
        ]);
    }


    public function actionView($slug){
        {
            $model = Author::find()->bySlug($slug)->one();

            if(!$model)  throw new NotFoundHttpException;

            //$model->updateCounters(['total_hits' => 1]);

            $searchModel = Yii::createObject(['class' => AphorismSearch::class, 'scenario' => ActiveRecord::SCENARIO_SEARCH]);
            $filter = $searchModel->load(Yii::$app->request->queryParams);

            $cacheId = CacheHelper::getActionCacheId(static::LIST_CACHE_ID);
            $res = Yii::$app->cache->get($cacheId);

            if (empty($res) OR $filter) {
                $dependency = Yii::createObject(TagDependency::class);

                $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
                $dataProvider->getSort()->defaultOrder = $this->orderBy;
                $dataProvider->getPagination()->pageSize = $this->pageSize;

                $res["html"] = $this->renderPartial('/aphorism/_grid', ["dataProvider" => $dataProvider]);

                $dependency->addTag($model->setClassTagSafe());
                $dependency->setTagsFromModels($dataProvider->getModels());

                //echo 'не из кеша';
                if(!$filter)
                    Yii::$app->cache->set($cacheId, $res, Yii::$app->params["cacheDuration"], $dependency);

            }

            return $this->render('view', compact('model', 'searchModel', 'dataProvider', 'res'));

        }
    }
} 