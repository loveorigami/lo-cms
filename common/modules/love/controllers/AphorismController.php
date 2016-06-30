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
     * @var \yii\data\ActiveDataProvider $dataProvider
     * @throws \yii\web\NotFoundHttpException
     * @return \yii\web\View $this
     */
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
        
        //$filter = $searchModel->load(Yii::$app->request->queryParams);

        $dataProvider = $searchModel->publicSearch(Yii::$app->request->queryParams);

        $dataProvider->sort->defaultOrder = $this->orderBy;

        return $this->render('index', compact('model', 'searchModel', 'dataProvider'));

    }

} 