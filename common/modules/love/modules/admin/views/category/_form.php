<?php
use lo\core\widgets\admin\Form;

/**
 * @var app\modules\catalog\models\CatalogSection $model модель
 */

echo Form::widget(["model" => $model]);