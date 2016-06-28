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

use common\modules\love\models\Story;
use common\modules\love\models\StorySearch;
use common\modules\love\models\Category;

class StoryController extends Controller
{

    const LIST_CACHE_ID = "story-list";

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
            $model = Category::findOne(['id' => Category::ROOT_STORY]);
        }

        if(!$model)  throw new NotFoundHttpException;

        $model->updateCounters(['total_hits' => 1]);

        $searchModel = Yii::createObject(['class' => StorySearch::class, 'scenario' => ActiveRecord::SCENARIO_SEARCH]);
        $filter = $searchModel->load(Yii::$app->request->queryParams);

        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->getSort()->defaultOrder = $this->orderBy;
        $dataProvider->getPagination()->pageSize = $this->pageSize;

        $res["html"] = $this->renderPartial('_grid', ["dataProvider" => $dataProvider]);


        return $this->render('index', compact('model', 'searchModel', 'dataProvider', 'res'));

    }

} 