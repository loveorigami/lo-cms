<?php
/**
 * Created by PhpStorm.
 * User: loveorigami
 * Date: 8/1/16
 * Time: 2:01 PM
 */

namespace common\modules\love\controllers;

use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

use lo\core\db\ActiveRecord;

use lo\core\cache\TagDependency;
use lo\core\cache\CacheHelper;

use common\modules\love\models\Aphorism;
use common\modules\love\models\AphorismSearch;
use common\modules\love\models\Category;

class AphorismController extends Controller
{

    const LIST_CACHE_ID = "aphorism-list";

    /**
     * @var array сортировка
     */
    public $orderBy = ["aggregate_rating" => SORT_DESC];

    /**
     * @var int количество новостей на странице
     */
    public $pageSize = 20;

    /**
     * @var int ширина детального изображения
     */
    public $detailImageWidth = 240;

    /**
     * @var int ширина списочного изображения
     */
    public $previewImageWidth = 120;


    public function actionIndex($cat = '')
    {
        if ($cat) {
            $model = Category::find()->bySlug($cat)->one();
        } else {
            $model = Category::findOne(['id' => Category::ROOT_APHORISM]);
        }

        if(!$model)  throw new NotFoundHttpException;

        $model->updateCounters(['total_hits' => 1]);

        $searchModel = Yii::createObject(['class' => AphorismSearch::class, 'scenario' => ActiveRecord::SCENARIO_SEARCH]);
        $filter = $searchModel->load(Yii::$app->request->queryParams);

        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        //print_r(Yii::$app->request->queryParams);

        $dataProvider->getSort()->defaultOrder = $this->orderBy;
        $dataProvider->getPagination()->pageSize = $this->pageSize;
        $dataProvider->getPagination()->forcePageParam = false;
        $dataProvider->getPagination()->route = '/love/aphorism/index';
        //$dataProvider->getPagination()->params = ['cat'];

        $res["html"] = $this->renderPartial('_grid', ["dataProvider" => $dataProvider]);

/*        $cacheId = CacheHelper::getActionCacheId(static::LIST_CACHE_ID);
        $res = '';
        //$res = Yii::$app->cache->get($cacheId);

        if (empty($res) OR $filter) {
            $dependency = Yii::createObject(TagDependency::class);

            $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
            $dataProvider->getSort()->defaultOrder = $this->orderBy;
            $dataProvider->getPagination()->pageSize = $this->pageSize;

            $res["html"] = $this->renderPartial('_grid', ["dataProvider" => $dataProvider]);

            $dependency->addTag($model->setClassTagSafe());
            $dependency->setTagsFromModels($dataProvider->getModels());

            //echo 'не из кеша';
            if(!$filter)
                Yii::$app->cache->set($cacheId, $res, Yii::$app->params["cacheDuration"], $dependency);

        }*/

        return $this->render('index', compact('model', 'searchModel', 'dataProvider', 'res'));

    }

} 