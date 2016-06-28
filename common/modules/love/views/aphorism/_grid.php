<?php

use lo\core\widgets\block\Block;
use yii\widgets\ListView;

Block::begin(['type'=>'content']);
echo ListView::widget([
    'layout' => "{summary}\n{sorter}\n<div class='clearfix'></div>{items}\n{pager}", // Add sorter to layout because it's turned off by default
    'dataProvider' => $dataProvider,
    'itemView' => '_item',
    'sorter'=>[
        'attributes'=>['aggregate_rating', 'favorites', 'author', 'date']
    ],
]);
Block::end();

