<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;


class CarritoController extends Controller
{

    //muestra los productos del carrito
    public function index()
    {
        return view('carrito.index');
    }

    //inicia el proceso de compra - reserva
    public function startCheckout()
    {
        //selector de metodo de pago
        return view('carrito.start');
    }

    //redirigimos al controlador de pago
    public function checkout(Request $request)
    {
        //metodo pago
        $metodo_pago = $request->input('metodo_pago');

        //PEDIDO INSERT

        //PASARELA PAGO
        //paypal
        $paypalController = new PaypalController();
        return $paypalController->processPayment($request);
    }




}
