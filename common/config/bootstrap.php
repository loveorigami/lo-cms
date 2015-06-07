<?php
Yii::setAlias('@base', realpath(__DIR__.'/../../'));
Yii::setAlias('common', dirname(__DIR__));
Yii::setAlias('frontend', dirname(dirname(__DIR__)) . '/frontend');
Yii::setAlias('backend', dirname(dirname(__DIR__)) . '/backend');
Yii::setAlias('console', dirname(dirname(__DIR__)) . '/console');
Yii::setAlias('storage', dirname(dirname(__DIR__)) . '/frontend/web/uploads');

// Url Aliases
Yii::setAlias('frontendUrl', 'http://site.lo');
Yii::setAlias('backendUrl', 'http://admin.lo');
Yii::setAlias('storageUrl', 'http://site.lo/uploads');