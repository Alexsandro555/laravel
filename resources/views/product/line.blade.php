@extends('layouts.master')
@section('title', 'Линиейка продукции')
@section('content')
    <product-line v-bind:elements-arr="{{json_encode($resultArr)}}"></product-line>
@stop
