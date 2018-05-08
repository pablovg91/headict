@extends('layouts.app')

@section('title', 'Page Title')


@section('content')

    <h2>Selecciona metodo de pago y revisa factura</h2>
    <p>Carrito/JSON generado manualmente</p>

    <h4>Metodo de págo:</h4>
    <p>PayPal</p>

    <form action="http://localhost:8000/checkout" method="POST">
        {{ csrf_field() }}
        <input type="hidden" name="metodo_pago" value="paypal">

        <input type="hidden" name="articulos[0][product_id]" value="1">
        <input type="hidden" name="articulos[0][cantidad]" value="2">

        <input type="hidden" name="articulos[1][product_id]" value="2">
        <input type="hidden" name="articulos[1][cantidad]" value="1">

        <input type="hidden" name="articulos[2][product_id]" value="3">
        <input type="hidden" name="articulos[2][cantidad]" value="3">

        <input type="submit" value="Comprar con PayPal">
    </form>

    <h4>Factura:</h4>
    <ul>
        <li>producto 1</li>
        <li>producto 2</li>
    </ul>
    <p>Total: 0.20 €</p>


@endsection