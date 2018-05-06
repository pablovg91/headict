@extends('layouts.app')

@section('title', 'Page Title')


@section('content')
    <h2>Articulo</h2>
    @if ( !$articulo )
        No existe ese articulo
    @else
        {{ $articulo->nombre }}
    @endif
@endsection