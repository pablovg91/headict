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
        //req
        $articulos = $request->input('articulos');
        $metodo_pago = $request->input('metodo_pago');


        //si existen articulos && product_id -> vigente
        if(isset($articulos)) {

            //CREACION CHECKOUT
            $checkout = new App\Checkout();
            $checkout->save();
            $request->request->set('checkout_id',$checkout->id);

            //CREACION DETALLES
            foreach ($articulos as $articulo) {
                $cantidad = $articulo["cantidad"];
                $articulo = App\Articulo::findOrFail($articulo["product_id"]);

                //DETALLE
                $detalle = new App\Detalle();
                $detalle->checkout_id = $checkout->id;
                $detalle->articulo_id = $articulo->id;
                $detalle->cantidad = $cantidad;
                $detalle->precio = $articulo->precio;
                $detalle->save();
            }

            //PASARELA PAGO
            $paypalController = new PaypalController();
            return $paypalController->processPayment($request);

        }else{
            //si hubo algun problema
            return view('carrito.error');
        }
    }




}
