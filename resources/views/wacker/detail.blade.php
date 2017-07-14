@extends('layouts.wacker')

@section('content-item')
        <div class="detail">
            <div>
                <div class="detail__header">
                    <h1>Высокочастотный глубинный вибратор <br>Wacker Neuson</h1><br>  арт.5100010533
                </div>
                <div class="detail__IEC">
                    IEC 38/230/5/15
                </div>
            </div>
            <div class="sd">
                <div class="detail__images">
                    Изображение
                </div>
                <div class="detail__slider">
                    <div class="service__menu-slider" style="display: flex; padding-left:60px;">
                        <alex-carousel name="carousel3" style="width: 400px; height: 400px"  :pagination-enabled=false :navigation-enabled=true :per-page=3 :scroll-per-page=true :per-page-custom="[[480, 3], [768, 3]]">
                            <alex-slide>
                                <div class="content__sliders">
                                    <img src="{{asset('css/wacker/img/carouser-image-1.png')}}"/>
                                </div>
                            </alex-slide>
                            <alex-slide>
                                <div class="content__sliders">
                                    <img src="{{asset('css/wacker/img/carouser-image-1.png')}}"/>
                                </div>
                            </alex-slide>
                            <alex-slide>
                                <div class="content__sliders">
                                    <img src="{{asset('css/wacker/img/carouser-image-1.png')}}"/>
                                </div>
                            </alex-slide>
                            <alex-slide>
                                <div class="content__sliders">
                                    <img src="{{asset('css/wacker/img/carouser-image-1.png')}}"/>
                                </div>
                            </alex-slide>
                            <alex-slide>
                                <div class="content__sliders">
                                    <img src="{{asset('css/wacker/img/carouser-image-1.png')}}"/>
                                </div>
                            </alex-slide>
                            <alex-slide>
                                <div class="content__sliders">
                                    <img src="{{asset('css/wacker/img/carouser-image-1.png')}}"/>
                                </div>
                            </alex-slide>
                            <alex-slide>
                                <div class="content__sliders">
                                    <img src="{{asset('css/wacker/img/carouser-image-1.png')}}"/>
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
                        <th class="table__kol">В наличии</th>
                        </thead>
                        <tbody>
                        <tr>
                            <td>Диаметр булавы: 38 мм</td>
                            <td rowspan="4"><span>3 123 456</span> руб.</td>
                            <td rowspan="4">1</td>
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
                    <div class="list1">
                        <ul>
                            <li>Технический каталог 1</li>
                            <li>Технический каталог 2</li>
                        </ul>
                    </div>
                    <div class="list2">
                        <ul>
                            <li>Технический каталог 3</li>
                            <li>Технический каталог 4</li>
                        </ul>
                    </div>
                    <ul>
                        <li>Высокочастотный глубинный вибратор IEC 38/230/5/15</li>
                        <li>Диаметр булавы 38 мм, длина булавы 285 мм, длина вала 5 метров</li>
                        <li>Подключение к обычной розетке на 220 V~ (1 фаза)</li>
                        <li>Проверенное качество от немецкого производителя Wacker Neuson</li>
                        <li>Для уплотнения бетона с воздействием вибрации высокой частоты</li>
                    </ul>
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
    </script>
@stop