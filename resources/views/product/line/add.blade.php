@extends('layouts.master')

@if (!isset($line))
    @section('title', 'Добавление линейки продукции')
@else
    <?php $title = 'Редактирование линейки '.$line->title;?>
    @section('title', $title)
@endif

@section('content')
    @if (!isset($line))
        <h1>Добавление линейки продукции</h1>
    @else
        <h1>Редактирование линейки <?php echo $line->name; ?></h1>
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

    @if (isset($line))
        {!! Form::model($line, ['route' => ['update-line', $line->id]]) !!}
    @else
        {!! Form::open(['route' => 'add-line', 'method' => 'post']) !!}
    @endif
    <div class="form-group">
        {!! Form::label('type_product_id','Товарный номер вида экономической деятельности') !!}
        @if(isset($line))
            {!! Form::select('type_product_id', $typeProducts, $lines->type_product_id, ['placeholder' => 'Выберите тип продукции','class' => 'form-control']) !!}
        @else
            {!! Form::select('type_product_id', $typeProducts, null, ['placeholder' => 'Выберите тип продукции','class' => 'form-control']) !!}
        @endif
    </div>
    <div class="form-group">
        {!! Form::label('producer_id','Производитель') !!}
        @if(isset($line))
            {!! Form::select('producer_id', $producers, $lines->producer_id, ['placeholder' => 'Выберите производителя','class' => 'form-control']) !!}
        @else
            {!! Form::select('producer_id', $producers, null, ['placeholder' => 'Выберите производителя','class' => 'form-control']) !!}
        @endif
    </div>
    <div class="form-group">
        {!! Form::label('name_line','Наименование линейки продукции') !!}
        {!! Form::text('name_line', null, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('sort','Сортировка') !!}
        {!! Form::text('sort', null, ['class' => 'form-control']) !!}
    </div>
    {!! Form::submit('Сохранить', ['class' => 'btn btn-primary']) !!}
    {!! Form::token() !!}
    {!! Form::close() !!}
@stop