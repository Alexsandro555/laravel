@extends('layouts.wacker')

@section('content-item')
<div class="content__catalog">
    <p class="breadrcumbs">
        Главная <img src="{{asset('css/wacker/img/breadcrumbs.png')}}" class="breadrcumbs-img"> Внутреняя
    </p>
    <div class="content__header">
        <h2>{{$typeProduct->title}}</h2>
        <img src="{{asset('css/wacker/img/gears-dark.png')}}" />
    </div>
    <p>
        {!! $typeProduct->description !!}
    </p>
</div>
<div class="clear"></div>
<div class="main_products">
    @foreach($producerTypeProducts as $producerTypeProduct)
        <div class="main_products__item">
            <div class="main_products__image">
                @if(!empty($producerTypeProduct->files))
                    @foreach($producerTypeProduct->files as $file)
                        <img src="{{asset('../storage/'.$file->filename)}}" width="170px"/>
                        <?php break; ?>
                    @endforeach
                @else
                    <img src="{{asset('css/wacker/img/no-image-product.png')}}" />
                @endif
            </div><br>
            <div class="main_products__line"><a href="#">{{(strlen($producerTypeProduct->name_line) > 100)?substr($producerTypeProduct->name_line,0,50)."...":$producerTypeProduct->name_line}}</a></div>
        </div>
    @endforeach
</div>
@stop

@section('content')
    <?php $firstProductLines = array_shift($productLine); ?>
    @if ($firstProductLines)
        <div class="sub-catalog-wrapper">
            <div class="sub-catalog">
                <br>
                <div class="about__header-catalog">
                    <h2>{{$firstProductLines["title"]}}</h2>
                    <img src="{{asset('css/wacker/img/gears-dark.png')}}" />
                </div>
                @foreach($firstProductLines["products"] as $firstProductLine)
                    <div class="sub-catalog__content-slider">
                        <div class="wrap">
                            <div class="sub-catalog__image">
                                @if(!empty($firstProductLine->files))
                                    @foreach($firstProductLine->files as $file)
                                        <img src="{{asset('../storage/'.$file->filename)}}" width="194px"/>
                                        <?php break; ?>
                                    @endforeach
                                @else
                                    <img src="{{asset('css/wacker/img/no-image-product.png')}}"/>
                                @endif
                            </div><br><br>
                            <a href="#">{{(strlen($firstProductLine->title) > 65)?substr($firstProductLine->title,0,65)."...":$firstProductLine->title}}</a><br>
                            <div class="sub-catalog__price"><span>{{$firstProductLine->price}}</span> р.</div>
                            <div class="sub-catalog__adv-info">
                                @if($firstProductLine->IEC)
                                    <span class="sub-catalog__IEC">IEC {{$firstProductLine->IEC}}</span><br>
                                @endif
                                <span class="sub-catalog-desc">{{(strlen(strip_tags($firstProductLine->description)) > 150)?substr(strip_tags($firstProductLine->description),0,150)."...":strip_tags($firstProductLine->description)}}</span>
                                <button class="sub-catalog__detail">ПОДРОБНЕЕ</button>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @endif
    <?php $secondProductLines = array_shift($productLine); ?>
    @if ($secondProductLines)
    <div class="wacker">
        <div class="wacker__wrapper">
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
                <div class="wacker__carousel">
                    <div class="wacker__header">
                        <h2>{{$secondProductLines["title"]}}</h2>
                        <img src="{{asset('css/wacker/img/gears-orange.png')}}" />
                    </div>
                    <leader-slider :url="'/admin/product-line/{{$secondProductLines["id"]}}'"></leader-slider>
                </div>
            </div>
        </div>
    </div>
    @endif
    <?php $thirdProductLines = array_shift($productLine); ?>
    @if ($thirdProductLines)
    <div class="product-line-1-wrapper">
        <div class="product-line-1">
            <div class="product-line-1__header-catalog">
                <h2>{{$thirdProductLines["title"]}}</h2>
                <img src="{{asset('css/wacker/img/gears-dark.png')}}" />
            </div>
            <leader-slider :url="'/admin/product-line/{{$thirdProductLines["id"]}}'"></leader-slider>
        </div>
    </div>
    @endif
    <?php $fourProductLines = array_shift($productLine); ?>
    @if ($fourProductLines)
    <div class="sub-catalog-wrapper">
        <div class="sub-catalog">
            <div class="sub-catalog__header-catalog">
                <h2>{{$fourProductLines["title"]}}</h2>
                <img src="{{asset('css/wacker/img/gears-dark.png')}}" />
            </div>
            <div class="sub-catalog__menu-slider" style="display: flex; padding-left:60px;">
                <leader-slider :url="'/admin/product-line/{{$fourProductLines["id"]}}'"></leader-slider>
            </div>
        </div>
    </div>
    @endif
    <div class="catalog-description-wrapper">
        <div class="catalog-description">
            <div class="catalog-text">
                <h2>На сегодняшний день данная группа оборудования делится на:</h2>
                <ul>
                    <li>
                        Глубинные вибраторы для бетона с электромеханическим приводом (серия HMS)
                    </li>
                    <li>
                        Погружные высокочастотные для уплотнения бетона (серия IREN, IRFU)
                    </li>
                    <li>
                        Внешние для опалубки (серия AR)
                    </li>
                </ul>

                <h2>Глубинные вибраторы для бетона с электромеханическим приводом (серия HMS)</h2>
                HMS - система из электромеханического привода, гибкого вала и вибробулавы. Это трехсоставной механизм, где каждый элемент имеет свой артикул
                и при необходимости вал или булава могут заменяться. Приводы выпускаются разной мощьности от 1 до 2.1 кВт, валы разных длин от 1 до 9 метров,
                и наконец булавы разного диаметра от 25 до 65 мм. Системы креплений на приводах M1500 и M2500 унифицированны с валами SM3, SM4, SM5, SM7. Привод M1000
                выпускается для особых валов и булав, меньшей длины и диаметра соответственно. Приводы M2500 считаются самыми надежными (в линейке бренда), так как
                имеют хороший запас мощности и обмотку высокого класса. Даже при длительной эксплуатации такой привод сохраняет оптимальные показатели и эффективно
                передает вращательное движение через гибкий вал в вибробулаву.
                <h2>Погружные высокочастотные вибраторы для уплотнения бетона (серия IREN, IRFU)</h2>
                LoremIpsumLoremIpsumLoremIpsumLoremIpsumLoremIpsum LoremIpsumLoremIpsum LoremIpsumLoremIpsum LoremIpsumLoremIpsum v
                LoremIpsumLoremIpsumLoremIpsum LoremIpsumvv LoremIpsumvv vLoremIpsum LoremIpsum LoremIpsumLoremIpsumLoremIpsum
                LoremIpsumLoremIpsumvvvLoremIpsumv LoremIpsumLoremIpsum LoremIpsum LoremIpsumLoremIpsumv
                LoremIpsumLoremIpsumLoremIpsumvvvvLoremIpsumvLoremIpsumLoremIpsumLoremIpsumLoremIpsum
                LoremIpsumLoremIpsumvLoremIpsumvLoremIpsum
                LoremIpsumLoremIpsumLoremIpsumvLoremIpsumvvLoremIpsumvLoremIpsum

            </div>
        </div>
    </div>
@stop


@section('view.scripts')
    <script>
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