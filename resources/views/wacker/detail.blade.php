@extends('layouts.wacker')

@section('cart')
    <button class="cart"><img src="{{asset('css/wacker/img/cart.png')}}"/>  10</button>
@stop

@section('content-item')
        <div class="detail">
            <div>
                <p class="breadrcumbs detail-broadrcubms">
                    Главная <img src="{{asset('css/wacker/img/breadcrumbs.png')}}" class="breadrcumbs-img"> Внутреняя
                </p>
                <div class="detail__header">
                    <h1>Высокочастотный глубинный вибратор <br>Wacker Neuson</h1><br>  арт.5100010533
                </div>
                <div class="detail__IEC">
                    IEC 38/230/5/15
                </div>
            </div>
            <div class="sd">
                <div class="detail__images">
                    <div class="detail-images-center">
                        <img src="{{asset('css/wacker/img/product-detail-image.png')}}"/>
                    </div>
                </div>
                <div class="detail__slider">
                    <div class="service__menu-slider" style="display: flex; padding-left:30px; height: 400px;">
                        <alex-carousel name="carousel3" style="width: 100px; height: 350px; margin-top: 30px"  :pagination-enabled=false :navigation-enabled=true :per-page=3  :per-page-custom="[[480, 3], [768, 3]]">
                            <alex-slide>
                                <div class="content__sliders  box-alex-slider">
                                    <img src="{{asset('css/wacker/img/detail-carousel-image.png')}}"/>
                                </div>
                            </alex-slide>
                            <alex-slide>
                                <div class="content__sliders box-alex-slider">
                                    <img src="{{asset('css/wacker/img/detail-carousel-image.png')}}"/>
                                </div>
                            </alex-slide>
                            <alex-slide>
                                <div class="content__sliders box-alex-slider">
                                    <img src="{{asset('css/wacker/img/detail-carousel-image.png')}}"/>
                                </div>
                            </alex-slide>
                            <alex-slide>
                                <div class="content__sliders box-alex-slider">
                                    <img src="{{asset('css/wacker/img/detail-carousel-image.png')}}"/>
                                </div>
                            </alex-slide>
                            <alex-slide>
                                <div class="content__sliders box-alex-slider">
                                    <img src="{{asset('css/wacker/img/detail-carousel-image.png')}}"/>
                                </div>
                            </alex-slide>
                            <alex-slide>
                                <div class="content__sliders box-alex-slider">
                                    <img src="{{asset('css/wacker/img/detail-carousel-image.png')}}"/>
                                </div>
                            </alex-slide>
                            <alex-slide>
                                <div class="content__sliders box-alex-slider">
                                    <img src="{{asset('css/wacker/img/detail-carousel-image.png')}}"/>
                                </div>
                            </alex-slide>
                        </alex-carousel>
                    </div>
                </div>
                <div class="detail__characteristics">
                    <table class="detail__table">
                        <thead>
                        <th class="table__main">Характеристики</th>
                        <th></th>
                        <th></th>
                        <th class="table__kol">В наличии  <img src="{{asset('css/wacker/img/available.png')}}"/></th>
                        </thead>
                        <tbody>
                        <tr>
                            <td>Диаметр булавы: 38 мм</td>
                            <td rowspan="4"><span>3 123 456</span> руб.</td>
                            <td rowspan="4" width="80px">
                                <div class="detail-counter">
                                    <div class="detail-counter__left"><img src="{{asset('css/wacker/img/detail-counter-arrow-down.png')}}"/></div>
                                    <div class="detail-counter__center">3</div>
                                    <div class="detail-counter__right"><img src="{{asset('css/wacker/img/detail-counter-arrow-up.png')}}"/></div>
                                </div>
                            </td>
                            <td rowspan="4" class="table__sale">
                                <button class="table__btn">Купить</button>
                            </td>
                        </tr>
                        <tr>
                            <td>Длина шланга: 5 м</td>
                        </tr>
                        <tr>
                            <td>Подключение: 220 V</td>
                        </tr>
                        <tr>
                            <td>Потребляемый ток: 4 A</td>
                        </tr>
                        </tbody>
                    </table><br>
                    <div class="tech-catalog">
                        <ul>
                            <li>Технический каталог 1</li>
                            <li>Технический каталог 2</li>
                        </ul>
                    </div>
                    <div class="tech-catalog">
                        <ul>
                            <li>Технический каталог 3</li>
                            <li>Технический каталог 4</li>
                        </ul>
                    </div>
                    <div class="characteristics-list">
                        <ul>
                            <li>Высокочастотный глубинный вибратор IEC 38/230/5/15</li>
                            <li>Диаметр булавы 38 мм, длина булавы 285 мм, длина вала 5 метров</li>
                            <li>Подключение к обычной розетке на 220 V~ (1 фаза)</li>
                            <li>Проверенное качество от немецкого производителя Wacker Neuson</li>
                            <li>Для уплотнения бетона с воздействием вибрации высокой частоты</li>
                        </ul>
                    </div>
                </div>
                <div class="clear"></div>
            </div>
        </div>
@stop

@section('content')
    <div class="detail-characteristics-wrapper">
        <div class="detail-characteristics">
            <br>
            <button class="detail-characteristics__btn-tech">Технические характеристики</button>
            <button class="detail-characteristics__btn-tech">Описание</button>
            <button class="detail-characteristics__btn-tech">Подробнее</button>
            <br><br>
            <div class="detail-characteristics__left-table">
                        <table class="detail-characteristics__table">
                    <thead>
                    <tr>
                        <th >Тип вибратора</th>
                        <th  class="tbl-left">высокочастотный</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td width="50%">Диаметр булавы,мм</td>
                        <td width="50%">38</td>
                    </tr>
                    <tr>
                        <td>Длина шланга,м</td>
                        <td>5</td>
                    </tr>
                    <tr>
                        <td>Силовой кабель,м</td>
                        <td>15</td>
                    </tr>
                    <tr>
                        <td>Подключение,V</td>
                        <td>220</td>
                    </tr>
                    <tr>
                        <td>Длина булавы,мм</td>
                        <td>285</td>
                    </tr>
                    </tbody>
                </table>
            </div>

            <div class="detail-characteristics__right-table">
                <table class="detail-characteristics__table">
                    <thead>
                    <th>Тип вибратора</th>
                    <th class="tbl-left">высокочастотный</th>
                    </thead>
                    <tbody>
                    <tr>
                        <td>Диаметр булавы,мм</td>
                        <td>38</td>
                    </tr>
                    <tr>
                        <td>Длина шланга,м</td>
                        <td>5</td>
                    </tr>
                    <tr>
                        <td>Силовой кабель,м</td>
                        <td>15</td>
                    </tr>
                    <tr>
                        <td>Подключение,V</td>
                        <td>220</td>
                    </tr>
                    <tr>
                        <td>Длина булавы,мм</td>
                        <td>285</td>
                    </tr>
                    </tbody>
                </table>
            </div>

            <div class="clear"></div>
        </div>
    </div>
    <div class="detail-info-wrapper">
        <div class="detail-info">
            <div class="detail-info-news">
                <h2>НОВОСТИ КОМПАНИИ</h2>
                <div class="detail-info-news__item">
							<span>
								<div class="detail-info-news__date">12.05.2017</div>
								<a href="#">Заголовок тестовой новости</a><br>
								Это пример текста новости, создан для примера. Краткий анонс...
								<br>
								<br>
							</span>
                </div>
                <div class="detail-info-news__item">
							<span>
								<div class="detail-info-news__date">12.05.2017</div>
								<a href="#">Заголовок тестовой новости</a><br>
								Это пример текста новости, создан для примера. Краткий анонс...
								<br>
								<br>
							</span>
                </div>
                <button class="detail-info-news__button">ВСЕ НОВОСТИ</button>
            </div>
            <div class="detail-info__main">
                <h2>Закажи на сайте получи скидку!</h2>

                <h3>Подлинная продукция Wacker Neuson и оффициальная гарантия от производителя</h3>
                Мы торгуем оборудованием от всемирно известного немецкого производителя Wacker Neuson. Весь ассортимент
                имеет сертификаты, паспорта качества. На все оборудование предоставляется гарантийные талоны.

                <h3>Высокое качество по доступной цене</h3>
                Мы продаем стоительное оборудование из первых рук без наценок и посредников.

                <h3>Сервисное обслуживание и бесперебойное наличие товара на складе</h3>
                Сервисный центр производит работы различной сложности на современном оборудовании первокласными инженерами
            </div>
        </div>
    </div>
@stop

@section('view.scripts')
    <script>
        $(document).ready(function() {
            $('.content').addClass('no-background');
        });
        $(document).ready(function()
        {
            $('.menu-left ul').toggle('normal');
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