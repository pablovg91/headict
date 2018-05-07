@extends('layouts.app')

@section('title', 'Page Title')


@section('content')
    <h2>Articulo</h2>
    @if ( !$articulo )
        No existe ese articulo
    @else
        <div class="product_cont col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="product col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <p class="product_name">{{ $articulo->nombre }}</p>
            </div>
        </div>
    @endif
@endsection