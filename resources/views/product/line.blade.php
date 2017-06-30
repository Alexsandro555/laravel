@extends('layouts.master')
@section('title', 'Линия продукции')
@section('content')
    <product-line v-bind:arr-producers="{{json_encode($arrProducers)}}" v-bind:arr-type-products="{{json_encode($arrTypeProducts)}}" v-bind:arr-producer-type-products="{{json_encode($arrProducerTypeProducts)}}"></product-line>
@stop
