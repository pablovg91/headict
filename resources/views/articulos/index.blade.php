@extends('layouts.app')

@section('title', 'Page Title')


@section('content')
    <h2>Articulos</h2>
    @if ( !$articulos->count() )
        No existen articulos
    @else
        <ul>
            @foreach( $articulos as $articulo )
                <li>{{ $articulo->nombre }}

                    @if ($articulo->tipo )
                        - {{ $articulo->tipo->nombre }}
                    @endif

                </li>

                @if ( !$articulo->categorias->count() )
                    El artículo no tiene categorias
                @else
                    <ul>
                        @foreach( $articulo->categorias as $categoria )
                            <li>{{ $categoria->nombre }}</li>
                        @endforeach
                    </ul>
                @endif

            @endforeach
        </ul>
    @endif
@endsection