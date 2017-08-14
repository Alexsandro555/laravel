@extends('layouts.master')

@section('title', 'Каталог')

@section('content')
    <h1>Каталог</h1>
    <table class="table table-hover table-bordered">
        <thead class="thead-inverse">
        <th>#</th>
        <th>Заголовок</th>
        <th>URL-адрес</th>
        <th>Описание</th>
        <th>Актив.</th>
        <th>Сорт.</th>
        <th></th>
        </thead>
        <tbody>
        @foreach($categories as $category)
            <tr>
                <td class="col-xs-0.5" scope="row">{{ $category->id }}</td>
                <td class="col-xs-4" scope="row"><i class="fa fa-folder" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;<a href="{{route('list-categories',['id'=>$category->id])}}">{{ $category->title }}</a></td>
                <td class="col-xs-2" scope="row">{{ $category->url_key }}</td>
                <td class="col-xs-5" scope="row">{{ $category->description }}</td>
                <td class="col-xs-0.5" scope="row">{{ $category->active }}</td>
                <td class="col-xs-0.5" scope="row">{{ $category->sort }}</td>
                <td class="col-xs-1">
                    <a href="{{route('update-category',['id'=>$category->id])}}" type="button" class="btn btn-default btn-sm"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                    <a href="{{route('delete-category',['id' => $category->id])}}" type="button" class="btn btn-danger btn-sm" ><i class="fa fa-minus"></i></a>
                </td>
            </tr>
        @endforeach
        @foreach($products as $product)
            <tr>
                <td class="col-xs-0.5" scope="row">{{ $product->id }}</td>
                <td class="col-xs-4" scope="row"><a href="{{route('update-product',['id'=>$product->id])}}">{{ $product->title }}</a></td>
                <td class="col-xs-2" scope="row">{{ $product->url_key }}</td>
                <td class="col-xs-5" scope="row">{{ $product->description }}</td>
                <td class="col-xs-0.5" scope="row">{{ $product->active }}</td>
                <td class="col-xs-0.5" scope="row">{{ $product->sort }}</td>
                <td class="col-xs-1">
                    <a href="{{route('update-product',['id'=>$product->id])}}" type="button" class="btn btn-default btn-sm"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                    <a href="{{route('delete-product',['id' => $product->id])}}" type="button" class="btn btn-danger btn-sm" ><i class="fa fa-minus"></i></a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div>
        <div style="float: left;: left">
            <a href="{{route('add-product')}}" class="btn btn-info btn-sm">Добавить</a>
            <div class="btn-group btn-group-sm">
                <a href="{{route('tnved-csv')}}" class="btn btn-info">Загрузить ТНВЭД</a>
                <a href="{{route('type-product-add')}}" class="btn btn-info">Добавить тип продукции</a>
                <a href="{{route('add-producer')}}" class="btn btn-info">Добавить производителя</a>
                <a href="{{route('add-line')}}" class="btn btn-info">Добавить линейку продукции</a>
                <a href="{{route('create-attribute')}}" class="btn btn-info">Создать аттрибут</a>
                <a href="{{route('set-attributes')}}" class="btn btn-info">Привязка атрибутов</a>
            </div>
        </div>
        <div style="float:right">{{ $products->links() }}</div>
        <div style="clear:both"></div>
    </div>

@section('view.scripts')

@endsection
@stop