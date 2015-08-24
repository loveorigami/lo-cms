<?php
/**
 * @var $this yii\web\View
 */
?>
 <?php  if (Yii::$app->controller->action->id === 'login' or (Yii::$app->user->isGuest && Yii::$app->controller->action->id === 'error')) : ?>
    <?php $this->beginContent('@backend/views/layouts/main-login.php'); ?>
            <?php echo $content ?>
    <?php $this->endContent(); ?>
<?php else: ?>
<?php $this->beginContent('@backend/views/layouts/common.php'); ?>
    <div class="box">
        <div class="box-body">
            <?php
            if(Yii::$app->controller->module->id == 'admin'){
                $this->title='RBAC';
                echo $this->render('//layouts/_admin_menu');
            }
            ?>
            <?php echo $content ?>
        </div>
    </div>
<?php $this->endContent(); ?>
<?php endif; ?>