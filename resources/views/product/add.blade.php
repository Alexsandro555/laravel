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
    {!! Form::submit('Добавить', ['class' => 'btn btn-primary']) !!}
    {{link_to_route('showlist-page','Назад к списку',null,['type'=>'buttons', 'class'=>'btn btn-info'])}}
    {!! Form::token() !!}
    {!! Form::close() !!}

    <div style="margin-top: 50px;">
            <uploader url="/upload" :element-id={{(isset($product))?$product->id:0}}></uploader>
    </div>
@stop