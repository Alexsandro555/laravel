<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="{{asset('normalize.css')}}">
    <link href="https://fonts.googleapis.com/css?family=Play" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{asset('css/wacker/style.css')}}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Wacker</title>
</head>
<body>
<div id="app">
<header class="header-page">
    <div class="header-page__layout">
        <div class="header-page__main">
            <div class="logo">
                <div class="logo__layer">
                    <img src="{{asset('css/wacker/img/logo.png')}}"/>
                </div>
            </div>
            <div class="header-center">
                <nav class="menu-nav">
                    <ul>
                        <li><span>О КОМПАНИИ</span></li>
                        <li><img src="{{asset('css/wacker/img/header_menu_img.png')}}"/><span>НОВОСТИ</span></li>
                        <li><img src="{{asset('css/wacker/img/header_menu_img.png')}}"/><span>ОБОРУДОВАНИЕ</span></li>
                        <li><img src="{{asset('css/wacker/img/header_menu_img.png')}}"/><span>ДОСТАВКА И ОПЛАТА</span></li>
                        <li><img src="{{asset('css/wacker/img/header_menu_img.png')}}"/><span>КОНТАКТЫ</span></li>
                    </ul>
                </nav>
                <div class="header-info">
                    <div class="header-info__search">
                        <input type="text" placeholder=" найти на сайте" />
                        <button class="search-button"><img src="{{asset('css/wacker/img/search-icon.png')}}"/></button>
                    </div>
                    <div class="header-info__address">
                        <span><img src="{{asset('css/wacker/img/address-email.png')}}"/>&nbsp;&nbsp;&nbsp;<a href="mailto:info@oooleader.ru">info@oooleader.ru</a></span><br>
                        <span><img src="{{asset('css/wacker/img/address-marker.png')}}"/>&nbsp;&nbsp; Г.Москва, Большая Семеновская д.15</span>
                    </div>
                </div>
            </div>
            <div class="header-phone">
                <div>Звоните! <br><span>+7 (495) <span>780 47 96</span></span><br>
                <button class="back-call">ЗАКАЗАТЬ <img src="{{asset('css/wacker/img/phone-img.png')}}"/> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ЗВОНОК</button>
                @yield('cart')
            </div>
        </div>
    </div>
</header>
<div class="content-wrapper">
    <div class="content">
        <div class="main-slogan">
            <span>Технологическое оборудование</span>
            <div class="main-subslogan">Официальный дистрибьютор Wacker Neuson</div>
        </div>
        <div class="menu-slider" style="display: flex;">
            <carousel style="width: 1100px; height: 120px"  :pagination-enabled=false :navigation-enabled=true :per-page=8  :per-page-custom="[[480, 8], [768, 8]]">
                <slide>
                    <div class="content__slider">
                        <img src="{{asset('css/wacker/img/carouser-image-1.png')}}"/><br>
                        <span>Виброплиты</span>
                    </div>
                </slide>
                <slide>
                    <div class="content__slider">
                        <img src="{{asset('css/wacker/img/carouser-image-1.png')}}"/><br>
                        <span>Виброплиты</span>
                    </div>
                </slide>
                <slide>
                    <div class="content__slider">
                        <img src="{{asset('css/wacker/img/carouser-image-1.png')}}"/><br>
                        <span>Виброплиты</span>
                    </div>
                </slide>
                <slide>
                    <div class="content__slider">
                        <img src="{{asset('css/wacker/img/carouser-image-1.png')}}"/><br>
                        <span>Виброплиты</span>
                    </div>
                </slide>
                <slide>
                    <div class="content__slider">
                        <img src="{{asset('css/wacker/img/carouser-image-1.png')}}"/><br>
                        <span>Виброплиты</span>
                    </div>
                </slide>
                <slide>
                    <div class="content__slider">
                        <img src="{{asset('css/wacker/img/carouser-image-1.png')}}"/><br>
                        <span>Виброплиты</span>
                    </div>
                </slide>
                <slide>
                    <div class="content__slider">
                        <img src="{{asset('css/wacker/img/carouser-image-1.png')}}"/><br>
                        <span>Виброплиты</span>
                    </div>
                </slide>
                <slide>
                    <div class="content__slider">
                        <img src="{{asset('css/wacker/img/carouser-image-1.png')}}"/><br>
                        <span>Виброплиты</span>
                    </div>
                </slide>
                <slide>
                    <div class="content__slider">
                        <img src="{{asset('css/wacker/img/carouser-image-1.png')}}"/><br>
                        <span>Виброплиты</span>
                    </div>
                </slide>
                <slide>
                    <div class="content__slider">
                        <img src="{{asset('css/wacker/img/carouser-image-1.png')}}"/><br>
                        <span>Виброплиты</span>
                    </div>
                </slide>
                <slide>
                    <div class="content__slider">
                        <img src="{{asset('css/wacker/img/carouser-image-1.png')}}"/><br>
                        <span>Виброплиты</span>
                    </div>
                </slide>
                <slide>
                    <div class="content__slider">
                        <img src="{{asset('css/wacker/img/carouser-image-1.png')}}"/><br>
                        <span>Виброплиты</span>
                    </div>
                </slide>
            </carousel>
        </div>
        <div class="menu-left-wrapper">
            <div class="menu-left-wrapper">
                <div class="menu-left">
                    <div class="menu-left__header">КАТАЛОГ ПРОДУКЦИИ</div>
                    <ul>
                        @foreach(App\MenuLeft::getMenu() as $menu)
                            <li><a href="/wacker/catalog/{{$menu->id}}">{{$menu->title}}</a></li>
                        @endforeach
                    </ul>
                    <div class="menu-left__toggle">СВЕРНУТЬ</div>
                </div>
            </div>
        </div>

            @yield('content-item')
    </div>
</div>
@yield('content')

<div class="bottom-menu-wrapper">
    <div class="buttom-menu-container">
        <nav class="bottom-menu">
            <ul>
                <li><span>О КОМПАНИИ</span></li>
                <li><img src="{{asset('css/wacker/img/header_menu_img.png')}}"/><span>НОВОСТИ</span></li>
                <li><img src="{{asset('css/wacker/img/header_menu_img.png')}}"/><span>ОБОРУДОВАНИЕ</span></li>
                <li><img src="{{asset('css/wacker/img/header_menu_img.png')}}"/><span>ДОСТАВКА И ОПЛАТА</span></li>
                <li><img src="{{asset('css/wacker/img/header_menu_img.png')}}"/><span>КОНТАКТЫ</span></li>
            </ul>
        </nav>
    </div>
</div>
<div class="footer-wrapper">
    <div class="footer__container">
        <div class="footer__menu">
            <ul>
                <?php $counterMenu = 1; ?>
                @foreach(App\MenuLeft::getMenu() as $menu)
                    <li><a href="/wacker/catalog/{{$menu->id}}">{{$menu->title}}</a></li>
                    <?php
                        $counterMenu++;
                        if($counterMenu>7)
                        {
                            echo "</ul></div><div class='footer__menu'><ul>";
                            $counterMenu=1;
                        }
                    ?>
                @endforeach
            </ul>
        </div>
        <div class="footer__info">
            <div class="footer__tel">
                Звоните!<br>
                <span>+7(495)</span><span class="footer__tel-bold"> 780 47 96</span>
                <button class="back-call">ЗАКАЗАТЬ <img src="{{asset('css/wacker/img/phone-img.png')}}"/> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ЗВОНОК</button>
                <p>
                <div><img src="{{asset('css/wacker/img/footer-mail-img.png')}}"/><span> &nbsp;&nbsp;&nbsp;&nbsp;info@oooleader.ru</span></div>
                <div><img src="{{asset('css/wacker/img/footer-map-img.png')}}"/><span>  Г.Москва, Большая <br> Семеновская д.15</span></div>
                </p>
            </div>
            <div class="footer__logo">
                <img src="{{asset('css/wacker/img/logo.png')}}"/>
                <p>
                    Copyright 2017<br>
                    Компания Лидер
                </p>
            </div>
        </div>
    </div>
</div>
</div>
<script src="{{asset('js/app.js')}}" type="application/javascript"></script>
@yield('view.scripts')
</body>
</html>