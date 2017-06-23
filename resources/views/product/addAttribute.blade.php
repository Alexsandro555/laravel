@extends('layouts.master')
@section('title', 'Добавление атрибута')
@section('content')
    {!! Form::open(['route' => 'add-attribute', 'method' => 'post']) !!}
    <div class="form-group">
        {!! Form::label('title','Наименование атрибута') !!}
        {!! Form::text('title', null, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('alias','Алиас') !!}
        {!! Form::text('alias', null, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('sort','Сортировка') !!}
        {!! Form::number('sort', null, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('inshort','Отображать') !!}
        {!! Form::checkbox('inshort', true, false) !!}
    </div>
    {!! Form::submit('Добавить', ['class' => 'btn btn-primary']) !!}
    {!! Form::token() !!}
    {!! Form::close() !!}
@stop