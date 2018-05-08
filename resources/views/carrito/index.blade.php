@extends('layouts.app')

@section('title', 'Page Title')


@section('content')

    <h2>Carrito de la compra :D</h2>
    <p>Aki van todos los productos que tengas en el carrito de la compra, cargados por JS</p>


    <a href="{{route('startCheckout')}}">Comprar</a>
@endsection