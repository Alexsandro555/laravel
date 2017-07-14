@extends('layouts.master')

@if (!isset($product))
    @section('title', 'Добавление нового продукта')
@else
    <?php $title = 'Обновление продукта '.$product->title;?>
    @section('title', $title)
@endif

@section('content')

    @if (!isset($product))
        <h1>Добавление нового продукта</h1>
    @else
        <h1>Редактирование продукта <?php echo $product->name; ?></h1>
    @endif
    <br>

    <!-- Сообщения валидации -->
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <!--Конец сообщений валидации-->


    <ul class="nav nav-tabs" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" data-toggle="tab" href="#main" role="tab">Основные</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#attributes" role="tab">Атрибуты</a>
        </li>
    </ul>

    <div class="tab-content">
        <div class="tab-pane active" id="main" role="tabpanel">
            <br>
            @if (isset($product))
                {!! Form::model($product, ['route' => ['update-product', $product->id]]) !!}
            @else
                {!! Form::open(['route' => 'add-product', 'method' => 'post']) !!}
            @endif
            <div class="form-group">
                {!! Form::label('title','Название продукта') !!}
                {!! Form::text('title', null, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('url_key','URL-адрес') !!}
                {!! Form::text('url_key', null, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('price','Цена') !!}
                {!! Form::text('price', null, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('description','Описание') !!}
                {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('qty','Количество') !!}
                {!! Form::number('qty', null, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('sort','Сортировка') !!}
                {!! Form::number('sort', null, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('onsale','Скидка') !!}
                @if(isset($product))
                    {!! Form::checkbox('onsale', $product->onsale, $product->onsale ? true : false) !!}
                @else
                    {!! Form::checkbox('onsale', true, false) !!}
                @endif
            </div>
            <div class="form-group">
                {!! Form::label('special','Спецпредложение') !!}
                @if(isset($product))
                    {!! Form::checkbox('special', $product->special, $product->special ? true : false) !!}
                @else
                    {!! Form::checkbox('special', true, false) !!}
                @endif
            </div>
            <div class="form-group">
                {!! Form::label('need_order','Необходимо заказывать') !!}
                @if(isset($product))
                    {!! Form::checkbox('need_order', $product->need_order, $product->need_order ? true : false) !!}
                @else
                    {!! Form::checkbox('need_order', true, false) !!}
                @endif
            </div>
            <div class="form-group">
                {!! Form::label('active','Активен') !!}
                @if(isset($product))
                    {!! Form::checkbox('active', $product->active, $product->active ? true : false) !!}
                @else
                    {!! Form::checkbox('active', true, false) !!}
                @endif
            </div>
            <div class="form-group">
                {!! Form::label('category_id','Каталог') !!}
                @if(isset($category))
                    {!! Form::select('category_id', $category_all, $product->category_id, ['placeholder' => 'Выберите каталог для продукта','class' => 'form-control']) !!}
                @else
                    {!! Form::select('category_id', $category_all, null, ['placeholder' => 'Выберите каталог для продукта','class' => 'form-control']) !!}
                @endif
            </div>
            <div class="form-group">
                {!! Form::label('type_product_id','Тип продукта') !!}
                @if(isset($category))
                    {!! Form::select('type_product_id', $typeProductAll, $product->type_product_id, ['placeholder' => 'Выберите тип продукции','class' => 'form-control']) !!}
                @else
                    {!! Form::select('type_product_id', $typeProductAll, null, ['placeholder' => 'Выберите тип продукции','class' => 'form-control']) !!}
                @endif
            </div>
            <div class="form-group">
                {!! Form::label('product_line','Линейка продукции') !!}
                <selectbox v-bind:nameelement="'producer_type_product_id'"  v-bind:items="{{$productLine}}"  v-bind:placeholder="'Выбирите линейку продукции'" ></selectbox>
            </div>
            {!! Form::submit('Добавить', ['class' => 'btn btn-primary']) !!}
            {{link_to_route('showlist-page','Назад к списку',null,['type'=>'buttons', 'class'=>'btn btn-info'])}}
            {!! Form::hidden('files_ids', "[]", ['id'=>'files-id']) !!}
            {!! Form::hidden('model', 'App\Product') !!}
            {!! Form::token() !!}
            {!! Form::close() !!}
            <div style="margin-top: 50px;">
                <uploader url="/upload" :element-id={{(isset($product))?$product->id:0}}></uploader>
            </div>
        </div>
        <div class="tab-pane" id="attributes" role="tabpanel">
            @if (isset($attributes))
                {!! Form::open(['route' => 'upd-attribute', 'method' => 'post']) !!}
                {!! Form::hidden('product_id', $product->id) !!}
                @foreach($attributes as $attribute)
                    <div class="form-group">
                        {!! Form::label($attribute->alias,$attribute->title) !!}
                        {!! Form::text($attribute->alias, null, ['class' => 'form-control']) !!}
                    </div>
                @endforeach
                {!! Form::submit('Сохранить', ['class' => 'btn btn-primary']) !!}
                {!! Form::token() !!}
                {!! Form::close() !!}
            @endif
        </div>
    </div>
@stop