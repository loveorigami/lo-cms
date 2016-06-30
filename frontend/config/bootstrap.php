<?php
\Yii::$container->set('yii\data\Pagination', [
    'pageSizeLimit' => [1, 50],
    'forcePageParam' => false,
    'defaultPageSize' => 10,
    'pageSize' => 3,
]);