<?php
/**
 * @var $this yii\web\View
 */
?>
 <?php  if (Yii::$app->controller->action->id === 'login' or (Yii::$app->user->isGuest && Yii::$app->controller->action->id === 'error')) : ?>
    <?php $this->beginContent('@backend/views/layouts/main-login.php'); ?>
            <?php echo $content ?>
    <?php
    if (class_exists('yii\debug\Module')) {
        $this->off(\yii\web\View::EVENT_END_BODY, [\yii\debug\Module::getInstance(), 'renderToolbar']);
    }
    ?>
    <?php $this->endContent(); ?>
<?php else: ?>
<?php $this->beginContent('@backend/views/layouts/common.php'); ?>
    <div class="box">
        <div class="box-body">
            <?php echo $content ?>
        </div>
    </div>
<?php $this->endContent(); ?>
<?php endif; ?>