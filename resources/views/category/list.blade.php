@extends('layouts.master')

@section('title', 'Категории')

@section('content')
    <h1>Категории</h1>
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
    <?php /*<a href="{{route('add-category')}}" type="buttons" class="btn btn-info">Добавить</a>*/?>
        </div>
        <div style="float:right">{{ $products->links() }}</div>
        <div style="clear:both"></div>
    </div>

@section('view.scripts')

@endsection
@stop