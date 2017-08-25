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
                    <h1>{{$product->title}}</h1><br>
                    @if($product->article)
                        арт. {{$product->article}}
                    @endif
                </div>
                <div class="detail__IEC">
                    @if($product->IEC)
                        IEC {{$product->IEC}}
                    @endif
                </div>
            </div>
            <div class="sd">
                <leader-detail-image :url="'/admin/product-images/{{$product->id}}'"></leader-detail-image>
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
                            <td></td>
                            <td rowspan="4"><span>{{$product->price}}</span> руб.</td>
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
                        <?php $counter=1; ?>
                        @foreach($product->attributes as $attribute)
                            <tr>
                                <td>{{$attribute->title}}: {{$attribute->pivot->value}}</td>
                            </tr>
                            <?php $counter++; if($counter>3) break;?>
                        @endforeach
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
            <button class="detail-characteristics__btn-tech" v-bind:class="{detailActive: CharacteristicActive}" @click="tabActive('CharacteristicActive')">Технические характеристики</button>
            <button class="detail-characteristics__btn-tech" v-bind:class="{detailActive: DescriptionActive}" @click="tabActive('DescriptionActive')">Описание</button>
            <button class="detail-characteristics__btn-tech" v-bind:class="{detailActive: DetailActive}" @click="tabActive('DetailActive')">Подробнее</button>
            <br><br>
            <div v-if="CharacteristicActive == true">
                <div class="detail-characteristics__left-table">
                    <table class="detail-characteristics__table">
                        <tbody>
                        <?php $counter=1; ?>
                        @foreach($product->attributes as $attribute)
                            @if($attribute->pivot->value)
                                <tr>
                                    <td>{{$attribute->title}}</td>
                                    <td  class="tbl-left">{{$attribute->pivot->value}}</td>
                                </tr>
                            @endif
                            <?php
                                $counter++;
                                if($counter>9)
                                {
                                    echo "</tbody></table></div><div class='detail-characteristics__right-table'><table class='detail-characteristics__table'><tbody>";
                                    $counter=1;
                                }
                            ?>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="detail-characteristics__description" v-if="DescriptionActive == true">
                {!! $product->description !!}
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