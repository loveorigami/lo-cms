<?php
/**
 * @var $this yii\web\View
 */
use lo\core\widgets\admin\Menu;
use common\models\TimelineEvent;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\Breadcrumbs;
use lo\widgets\scrollup\ScrollUp;
use lo\modules\noty\Wrapper;
use mdm\admin\classes\MenuHelper;

?>

<?php $this->beginContent('@backend/views/layouts/base.php'); ?>
    <div class="wrapper">
        <!-- header logo: style can be found in header.less -->
        <header class="main-header">
            <a href="<?php echo Yii::getAlias('@frontendUrl') ?>" class="logo">
                <!-- Add the class icon to your logo image or logo icon to add the margining -->
                <?php echo Yii::$app->name ?>
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top" role="navigation">
                <!-- Sidebar toggle button-->
                <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only"><?php echo Yii::t('backend', 'Toggle navigation') ?></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>

                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                        <li id="timeline-notifications" class="notifications-menu">
                            <a href="<?php echo Url::to(['/timeline-event/index']) ?>">
                                <i class="fa fa-bell"></i>
                                <span class="label label-success">
                                    <?php echo TimelineEvent::find()->today()->count() ?>
                                </span>
                            </a>
                        </li>
                        <!-- Notifications: style can be found in dropdown.less -->
                        <li id="log-dropdown" class="dropdown notifications-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-warning"></i>
                            <span class="label label-danger">
                                <?php echo \lo\modules\core\models\SystemLog::find()->count() ?>
                            </span>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="header"><?php echo Yii::t('backend', 'You have {num} log items', ['num' => \lo\modules\core\models\SystemLog::find()->count()]) ?></li>
                                <li>
                                    <!-- inner menu: contains the actual data -->
                                    <ul class="menu">
                                        <?php foreach (\lo\modules\core\models\SystemLog::find()->orderBy(['log_time' => SORT_DESC])->limit(5)->all() as $logEntry): ?>
                                            <li>
                                                <a href="<?php echo Yii::$app->urlManager->createUrl(['/core/log/view', 'id' => $logEntry->id]) ?>">
                                                    <i class="fa fa-warning <?php echo $logEntry->level == \yii\log\Logger::LEVEL_ERROR ? 'text-red' : 'text-yellow' ?>"></i>
                                                    <?php echo $logEntry->category ?>
                                                </a>
                                            </li>
                                        <?php endforeach; ?>
                                    </ul>
                                </li>
                                <li class="footer">
                                    <?php echo Html::a(Yii::t('backend', 'View all'), ['/core/log/index']) ?>
                                </li>
                            </ul>
                        </li>
                        <!-- User Account: style can be found in dropdown.less -->
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <img
                                    src="http://gravatar.com/avatar/<?= Yii::$app->user->identity->profile->gravatar_id ?>?s=230"
                                    class="user-image">
                                <span><?php echo Yii::$app->user->identity->username ?> <i class="caret"></i></span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- User image -->
                                <li class="user-header light-blue">
                                    <img
                                        src="http://gravatar.com/avatar/<?= Yii::$app->user->identity->profile->gravatar_id ?>?s=230"
                                        class="img-circle" alt="User Image"/>

                                    <p>
                                        <?php Yii::$app->user->identity->username ?>
                                        <small>
                                            <?php echo Yii::t('backend', 'Member since {0, date, short}', Yii::$app->user->identity->created_at) ?>
                                        </small>
                                </li>
                                <!-- Menu Footer-->
                                <li class="user-footer">
                                    <div class="pull-left">
                                        <?php echo Html::a(Yii::t('backend', 'Profile'), ['/user/admin/update-profile?id=' . Yii::$app->user->identity->id], ['class' => 'btn btn-default btn-flat']) ?>
                                    </div>
                                    <div class="pull-left">
                                        <?php echo Html::a(Yii::t('backend', 'Account'), ['/user/admin/update?id=' . Yii::$app->user->identity->id], ['class' => 'btn btn-default btn-flat']) ?>
                                    </div>
                                    <div class="pull-right">
                                        <?php echo Html::a(Yii::t('backend', 'Logout'), ['/user/logout'], ['class' => 'btn btn-default btn-flat', 'data-method' => 'post']) ?>
                                    </div>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <?php echo Html::a('<i class="fa fa-cogs"></i>', ['/core/settings/index']) ?>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <!-- Left side column. contains the logo and sidebar -->
        <aside class="main-sidebar">
            <!-- sidebar: style can be found in sidebar.less -->
            <section class="sidebar">
                <!-- Sidebar user panel -->
                <div class="user-panel">
                    <div class="pull-left image">
                        <img
                            src="http://gravatar.com/avatar/<?= Yii::$app->user->identity->profile->gravatar_id ?>?s=230"
                            class="img-circle"/>
                    </div>
                    <div class="pull-left info">
                        <p><?php echo Yii::t('backend', 'Hello, {username}', ['username' => Yii::$app->user->identity->username]) ?></p>
                        <a href="<?php echo Url::to(['/user/admin/update-profile?id=' . Yii::$app->user->identity->id]) ?>">
                            <i class="fa fa-circle text-success"></i>
                            <?php echo Yii::$app->formatter->asDatetime(time()) ?>
                        </a>
                    </div>
                </div>

                <?php

                $callback = function ($menu) {
                    $data = eval($menu['data']);
                    $data['icon'] = isset($data['icon']) ? '<i class="fa fa-' . $data['icon'] . '"></i>' : '<i class="fa fa-angle-double-right"></i>';
                    $badge = '';
                    $badgeBgClass = '';

                    switch ($menu['route']) {
                        case '/timeline-event/index':
                            $badge = TimelineEvent::find()->today()->count();
                            $badgeBgClass = 'label-success';
                            break;
                        case '/log/index':
                            $badge = \lo\modules\core\models\SystemLog::find()->count();
                            $badgeBgClass = 'label-danger';
                            break;
                    }

                    return [
                        'label' => Yii::t('backend', $menu['name']),
                        'url' => [$menu['route']],
                        'icon' => $data['icon'],
                        'badge' => $badge,
                        'badgeBgClass' => $badgeBgClass,
                        'items' => $menu['children']
                    ];
                };

                echo Menu::widget([
                    'options' => ['class' => 'sidebar-menu'],
                    'labelTemplate' => '<a href="#">{icon}<span>{label}</span>{right-icon}</a>',
                    'linkTemplate' => '<a href="{url}">{icon}<span>{label}</span>{right-icon}</a>',
                    'submenuTemplate' => "\n<ul class=\"treeview-menu\">\n{items}\n</ul>\n",
                    'activateParents' => true,
                    'items' => MenuHelper::getAssignedMenu(Yii::$app->user->id, null, $callback)
                ]);
                ?>
            </section>
            <!-- /.sidebar -->
        </aside>

        <!-- Right side column. Contains the navbar and content of the page -->
        <aside class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                    <?php echo $this->title ?>
                    <?php if (isset($this->params['subtitle'])): ?>
                        <small><?php echo $this->params['subtitle'] ?></small>
                    <?php endif; ?>
                </h1>

                <?php echo Breadcrumbs::widget([
                    'tag' => 'ol',
                    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                ]) ?>
            </section>

            <!-- Main content -->
            <section class="content" id="ajax-loader">
                <?php echo $content ?>
            </section>
            <!-- /.content -->
        </aside>
        <!-- /.right-side -->
    </div><!-- ./wrapper -->

<?php $this->registerJs("$(window).on('beforeunload', function(){
       // $('.content-wrapper').loading();
    });") ?>

 <?= ScrollUp::widget([
    'theme' => ScrollUp::THEME_IMAGE,
    'themeDir' => '@lo/widgets/scrollup/themes/default', // dir with theme file css.
        'options' => [
            'scrollText' => "To top", // Text for element
            'scrollName'=> 'scrollUp', // Element ID
            //'topDistance'=> 400, // Distance from top before showing element (px)
            //'topSpeed'=> 3000, // Speed back to top (ms)
            //'animation' => ScrollUp::ANIMATION_SLIDE, // Fade, slide, none
            //'animationInSpeed' => 200, // Animation in speed (ms)
            //'animationOutSpeed'=> 200, // Animation out speed (ms)
            'activeOverlay' => false, // Set CSS color to display scrollUp active point, e.g '#00FFFF'
        ]
    ]);
?>

<?= Wrapper::widget([
           'layerClass' => lo\modules\noty\layers\Toastr::class,
]); ?>
<?php $this->endContent(); ?>