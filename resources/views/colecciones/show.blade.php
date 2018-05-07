@extends('layouts.app')

@section('title', 'Page Title')


@section('content')
    <h2>{{ $categoria->nombre }}</h2>
    <p>{{ $categoria->descripcion }}</p>
    @if ( !$categoria->articulos->count() )
        No existen articulos en esta categoria
    @else
        @foreach($categoria->articulos as $articulo)
            <div class="product_cont col-xs-4 col-sm-4 col-md-4 col-lg-4">
                <div class="product col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <a class="product_name" href="{{ route('articulos.show', $articulo->id) }}">
                        <span>{{ $articulo->nombre }}</span>
                        @if ($articulo->tipo )
                            - {{ $articulo->tipo->nombre }}
                        @endif
                    </a>

                    @if ( $articulo->categorias->count() )
                        <ul class="list_tags">
                            @foreach( $articulo->categorias as $categoria )
                                <li><a href="{{ route('categorias.show', $categoria->id) }}">{{ $categoria->nombre }}</a></li>
                            @endforeach
                        </ul>
                    @endif
                    <p class="precio">{{ $articulo->precio }} €</p>
                </div>
            </div>
        @endforeach
    @endif
@endsection