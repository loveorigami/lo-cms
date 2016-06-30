<?php
use yii\bootstrap\NavBar;
use yii\bootstrap\Nav;
use lo\modules\main\widgets\menu\Menu;

?>

<div class="logo"><a href="index.html"><img src="/themes/bsorigami/img/logo.png" alt="CZSale" title="Lo"/></a></div>
<!-- Topbar -->
<div class="row">
    <?php
    echo Menu::widget(
        [
            "options" => [
                'id' => 'topbar-nav',
                'class' => 'topbar-list topbar-menu pull-right',
                //'parentLevel'=>0,
            ],
            "sub_options" => [
                'class' => 'topbar-dropdown',
            ],
            "parentCode" => Yii::$app->user->isGuest ?
                Yii::$app->blocksProvider->getMenu('top', 'topbar-guest') :
                Yii::$app->blocksProvider->getMenu('top', 'topbar-user'),
            'level' => 2
        ]
    );
    ?>
</div>
<!-- End Topbar -->

<?php


NavBar::begin([ // отрываем виджет
    'brandLabel' => '', // название организации
    //'brandUrl' => Yii::$app->homeUrl, // ссылка на главную страницу сайта
    'options' => [
        'class' => 'navbar navbar-default', // стили главной панели
    ],
]);

echo Nav::widget([
    'options' => ['class' => 'nav navbar-nav navbar-right'], // стили ul
    'items' => [
        ['label' => 'Главная', 'url' => ['/site/index']],
        ['label' => 'О компании', 'url' => ['/site/about']],
        ['label' => 'Услуги', 'url' => ['/site/services']],
        ['label' => 'Контакты', 'url' => ['/site/contacts']],
        Yii::$app->user->isGuest ? // Если пользователь гость, показыаем ссылку "Вход", если он авторизовался "Выход"
            ['label' => 'Вход', 'url' => ['/site/login']] :
            [
                'label' => 'Выход (' . Yii::$app->user->identity->username . ')',
                'url' => ['/site/logout'],
                'linkOptions' => ['data-method' => 'post']
            ],
    ],
]);
NavBar::end(); // закрываем виджет
?>

<nav class="navbar navbar-default" role="navigation">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#czsale-navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
    </div>
    <div class="collapse navbar-collapse" id="czsale-navbar">
        <ul class="nav navbar-nav navbar-right">
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Pages <b class="caret"></b></a>
                <ul class="dropdown-menu">
                    <li><a href="index.html">Home page</a></li>
                    <li><a href="addClassified.html">Add classified</a></li>
                    <li><a href="category.html">Category page</a></li>
                    <li><a href="detail.html">Classified detail</a></li>
                    <li><a href="conditions.html">Rules & Conditions</a></li>
                    <li><a href="help.html">Help (FAQ)</a></li>
                    <li><a href="contact.html">Contact</a></li>
                    <li><a href="signUp.html">Sign Up</a></li>
                </ul>
            </li>
            <li><a href="help.html">Help</a></li>
            <li><a href="signUp.html">Sign Up</a></li>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Sign in <b class="caret"></b></a>
                <ul class="dropdown-menu" style="padding: 15px;min-width: 250px;">
                    <li>
                        <div class="row">
                            <div class="col-md-12">
                                <form class="form" role="form" method="post" action="login" accept-charset="UTF-8"
                                      id="login-nav">
                                    <div class="form-group">
                                        <label class="sr-only" for="exampleInputEmail2">Email address</label>
                                        <input type="email" class="form-control" id="exampleInputEmail2"
                                               placeholder="Email address" required>
                                    </div>
                                    <div class="form-group">
                                        <label class="sr-only" for="exampleInputPassword2">Password</label>
                                        <input type="password" class="form-control" id="exampleInputPassword2"
                                               placeholder="Password" required>
                                    </div>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox"> Remember me
                                        </label>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-success btn-block">Sign in</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <div class="form-group">
                            <button onclick="location.href='#'"
                                    class="btn btn-default btn-block btn-social btn-facebook"><i
                                    class="fa fa-facebook"></i> Sign in with Facebook
                            </button>
                            <button onclick="location.href='#'"
                                    class="btn btn-default btn-block btn-social btn-twitter"><i
                                    class="fa fa-twitter"></i> Sign in with Twitter
                            </button>
                            <button onclick="location.href='#'"
                                    class="btn btn-default btn-block btn-social btn-google-plus"><i
                                    class="fa fa-google-plus"></i> Sign in with Google
                            </button>
                        </div>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</nav>