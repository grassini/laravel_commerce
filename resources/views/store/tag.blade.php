
@extends('store.store')

@section('categories')
    @include('store.partial.categories')
@stop

@section('content')
    <div class="col-sm-9 padding-right">
        <!--features_items-->
        <div class="features_items">
            <h2 class="title text-center">Produtos da TAG <b>{{ $tag->name }}</b></h2>
            @include('store.partial.product', ['products' => $tag->products])
        </div>
    </div>
@stop