<?php
Yii::setAlias('base', realpath(__DIR__.'/../../'));
Yii::setAlias('common', dirname(__DIR__));
Yii::setAlias('frontend', dirname(dirname(__DIR__)) . '/frontend');
Yii::setAlias('backend', dirname(dirname(__DIR__)) . '/backend');
Yii::setAlias('console', dirname(dirname(__DIR__)) . '/console');
Yii::setAlias('storage', dirname(dirname(__DIR__)) . '/web/'.getenv('STORAGE_DIR'));
Yii::setAlias('storageb', dirname(dirname(__DIR__)) . '/web/'.getenv('ADMIN_PATH').'/'.getenv('STORAGE_DIR'));
Yii::setAlias('vendor', dirname(dirname(__DIR__)) . '/vendor');

Yii::setAlias('sxd', dirname(dirname(__DIR__)) . '/web/'.getenv('ADMIN_PATH').'/assets/sxd');
Yii::setAlias('@sxdUrl', getenv('BACKEND_URL').'/assets/sxd');

// Url Aliases
Yii::setAlias('@frontendUrl', getenv('FRONTEND_URL'));
Yii::setAlias('@backendUrl', getenv('BACKEND_URL'));
Yii::setAlias('@storageUrl', getenv('STORAGE_URL'));
Yii::setAlias('@editorUrl', '/'.getenv('STORAGE_DIR'));