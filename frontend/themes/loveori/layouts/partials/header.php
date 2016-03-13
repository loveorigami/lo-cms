<?php
use yii\bootstrap\Nav;

?>

<!--=== Header ===-->
<div class="header">
    <div class="container">

        <!-- Logo -->
        <a class="logo" href="index.html">
            <img src="/themes/loveori/img/logo1-default.png" alt="Logo">
        </a>
        <!-- End Logo -->
        <!-- Topbar -->
        <div class="row">
            <?= \lo\modules\main\widgets\menu\Menu::widget(
                [
                    "options" => [
                        'id'=>'topbar-nav',
                        'class' => 'topbar-list topbar-menu pull-right',
                        //'parentLevel'=>0,
                    ],
                    "sub_options" => [
                        'class' => 'topbar-dropdown',
                    ],
                    "parentCode" => Yii::$app->user->isGuest ?
                        Yii::$app->blocksProvider->getMenu('top', 'topbar-guest') :
                        Yii::$app->blocksProvider->getMenu('top', 'topbar-user'),
                    'level'=>2
                ]
            ); ?>
        </div>
        <!-- End Topbar -->



        <!-- Toggle get grouped for better mobile display -->
        <button type="button" class="navbar-toggle" data-toggle="collapse"
                data-target=".navbar-responsive-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="fa fa-bars"></span>
        </button>
        <!-- End Toggle -->
    </div>
    <!--/end container-->

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse mega-menu navbar-responsive-collapse">
        <div class="container">
            <?php
            $menuItems = [
                ['label' => 'Home', 'url' => ['/site/index']],
                ['label' => 'About', 'url' => ['/site/about']],
                ['label' => 'Aphorism', 'url' => ['/love/aphorism/index']],
                ['label' => 'Contact', 'url' => ['/site/contact']],
            ];

/*            $menuItems[] = '<li>
                        <i class="search fa fa-search search-btn"></i>

                        <div class="search-open">
                            <div class="input-group animated fadeInDown">
                                <input type="text" class="form-control" placeholder="Search">
                                    <span class="input-group-btn">
                                        <button class="btn-u" type="button">Go</button>
                                    </span>
                            </div>
                        </div>
                </li>';*/

            echo Nav::widget([
                'options' => ['class' => 'navbar-nav nav'],
                'encodeLabels' => false,
                'items' => $menuItems,
            ]);
            ?>
        </div>
        <!--/end container-->
    </div>
    <!--/navbar-collapse-->
</div>
<!--=== End Header ===-->