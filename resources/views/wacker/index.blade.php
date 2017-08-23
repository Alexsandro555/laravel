@extends('layouts.wacker')

@section('content-item')
    <div class="content__item">
        <div class="content__header">
            <h2>Наши акции и спецпредложения</h2>
            <img src="{{asset('css/wacker/img/gears-dark.png')}}" />
        </div>
        <button class="content-button">Смотреть все</button>
        <div class="main__content">
            <div class="content__text">
                <h2>Заголовок спецпредложения</h2>
                <p>Краткое описание акции или предложения, <br>создан для примера</p>
                <button class="back-call">ПОДРОБНЕЕ</button>
            </div>
        </div>
     </div>
@stop

@section('content')
    <div class="about-wrapper">
        <div class="about">
            <div class="about-main">
                <div class="about__header">
                    <h2>О компании лидер</h2>
                    <img src="{{asset('css/wacker/img/gears-white.png')}}" />
                </div>
                <div class="about__content">
                    <p>
                        Это пример текста о компании, создан для того, чтобы было понятно, где будет
                        размещаться краткая и сжатая информация об органзизаци. Она необходима для
                        продвижения сайта, так как именно в этом блоке размещаются ключевые запросы,
                        по коорым поисковые машины будут находить ваш сайт среди всех сайтов
                        аналогичной тематики.
                    </p>
                    <p>Тут расположен текст о компании, краткий анонс, более подробный и полный
                        текст о компании будет на внутренней странице, куда ведет ссылка...
                    </p>
                </div>
                <button class="about-button">ПОДРОБНЕЕ</button>
                <img class="about__image" src="{{asset('css/wacker/img/about-image.png')}}"/>
            </div>
            <div class="clear"></div>
        </div>
        <!--<div class="clear"></div>-->
    </div>
    <div class="wacker">
        <div class="wacker__wrapper">
            <div class="wacker__hrtop"></div>
            <div class="wacker__content">
                <div class="wacker-news">
                    <h2>НОВОСТИ КОМПАНИИ</h2>
                    <div class="wacker-news__item">
							<span>
								<div class="wacker-news__date">12.05.2017</div>
								<a href="#">Заголовок тестовой новости</a><br>
								Это пример текста новости, создан для примера. Краткий анонс...
								<br>
								<br>
							</span>
                    </div>
                    <div class="wacker-news__item">
							<span>
								<div class="wacker-news__date">12.05.2017</div>
								<a href="#">Заголовок тестовой новости</a><br>
								Это пример текста новости, создан для примера. Краткий анонс...
								<br>
								<br>
							</span>
                    </div>
                    <button class="wacker-news__button">ВСЕ НОВОСТИ</button>

                </div>
                <div class="wacker-about">

                    <h2>О КОМПАНИИ WACKER</h2>
                    <div class="wacker-about__text">
                        <p>Это пример текста о компании, создан для того, чтобы было понятно, где
                            будет размещана краткая и сжатая информация об организации.
                            Она необходима для продвижения сайта, так как именно в этом блоке
                            размещаются ключевые запросы, по которым поисковые машины будут находить
                            ваш сайт среди всех сайтов аналогичной тематики.</p>

                        <p>Тут расположен текст о компании, краткий анонс, более подробный и содержательный
                            текст о компании будет на внутренней странице, куда ведет ссылка...</p>
                        <a href="#">Оффициальный сайт</a><img src="{{asset('css/wacker/img/wacker-about-arrow.png')}}"/>
                    </div>

                </div>
                <div class="wacker-product">
                    <h2>ВИБРОПЛИТА <br>РЕВЕРСИВНОГО ХОДА</h2>
                    <div class="wacker-product__model">WACKER NEUSION WPU 1550</div>
                    <p class="wacker-product__desc">Удобное решение для уплотнения<br> асфальта</p>
                    <p>
                        <div class="wacker-product__price">Цена:<br><span>3 123 456 р.</span></div>
                    </p>
                    <div class="wacker-product-image">
                        <img src="{{asset('css/wacker/img/wacker-product-image.png')}}"/>
                        <img src="{{asset('css/wacker/img/wacker-product-image-t.png')}}"/>
                    </div>
                    <button class="wacker-product__button">ПОДРОБНЕЕ</button>
                </div>
            </div>
        </div>
    </div>
    <div class="service-wrapper">
        <div class="service__hrtop"></div>
        <div class="service">
            <div class="service__sentence">
                <div class="service__header-sentence">
                    <h2>Мы предлагаем</h2>
                    <img src="{{asset('css/wacker/img/gears-dark.png')}}" />
                </div>
                <div class="service__content">
                    <div class="service__menu-slider" style="display: flex;">
                        <leader-slider :url="'/admin/special-product/'"></leader-slider>
                    </div>
                </div>
            </div>
            <div class="service__delivery">
                <div class="service__header-delivery">
                    <h2>Доставка и оплата</h2>
                    <img src="{{asset('css/wacker/img/gears-dark.png')}}" />
                </div>
                <div class="service__content-delivery">
                    <p>
                        Мы понимаем, что нашим клиентам очень важно соблюдать сроки сдачи работ.
                        Поэтому отгрузка товара осуществляется в течении одного рабочего дня с момента
                        поступления оплаты.
                    </p>
                    <p>
                        Узнать подробнее об условиях доставки Вы можете при оформлении заказа у нашего
                        специалиста по телефону +7 (495) 780-47-96 или сделать запроспо электроной почте.
                    </p>
                    <ol>
                        <li><span class="service__num">1</span>Оплата производиться по безналичному расчету.</li>
                        <li><span class="service__num">2</span>Возможна оплата наличными при доставке на объект Заказчика.</li>
                    </ol>

                </div>
            </div>
        </div>
    </div>
@stop

@section('view.scripts')
    <script>
        /*$(document).ready(function() {
            $('.content').addClass('no-background');
        });*/
        $(document).ready(function()
        {
            $(".menu-left__toggle").addClass('rollup');
            //$('.menu-left ul').toggle('normal');
            $('.menu-left__toggle').click(function () {
                $(this).parent().children('ul').toggle('normal');
                if(this.innerHTML == 'РАЗВЕРНУТЬ') {
                    this.innerHTML = 'СВЕРНУТЬ';
                    $(".menu-left__toggle").addClass('rollup');
                }
                else
                {
                    this.innerHTML = 'РАЗВЕРНУТЬ';
                    $(".menu-left__toggle").removeClass('rollup');

                }
                return false;
            });
        });
    </script>
@stop