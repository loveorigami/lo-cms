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
        <div class="topbar">
            <ul class="loginbar pull-right">
                <li class="hoverSelector">
                    <i class="fa fa-globe"></i>
                    <a>Languages</a>
                    <ul class="languages hoverSelectorBlock">
                        <li class="active">
                            <a href="#">English <i class="fa fa-check"></i></a>
                        </li>
                        <li><a href="#">Spanish</a></li>
                        <li><a href="#">Russian</a></li>
                        <li><a href="#">German</a></li>
                    </ul>
                </li>
                <li class="topbar-devider"></li>
                <li><a href="page_faq.html">Help</a></li>
                <li class="topbar-devider"></li>
                <li><a href="page_login.html">Login</a></li>
            </ul>
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
            if (Yii::$app->user->isGuest) {
                $menuItems[] = ['label' => 'Signup', 'url' => ['/user/registration/register']];
                $menuItems[] = ['label' => 'Login', 'url' => ['/user/security/login']];
            } else {
                $menuItems[] = [
                    'label' => 'Profile',
                    'url' => ['/user/settings/profile'],
                ];
                $menuItems[] = [
                    'label' => 'Logout (' . Yii::$app->user->identity->username . ')',
                    'url' => ['/user/security/logout'],
                    'linkOptions' => ['data-method' => 'post']
                ];
            }

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