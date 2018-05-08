<?php

namespace App\Http\Controllers;

use App\Checkout;
use Illuminate\Http\Request;
use App\Articulo;
use Illuminate\Support\Facades\Redirect;

class PaypalController extends Controller
{
    public function __construct() {

        // do something
    }

    //
    public function processPayment(Request $request)
    {
        //req
        $articulos = $request->input('articulos');
        $checkout_id = $request->input('checkout_id');

        //isset req-articulos
        if(isset($articulos)){

            //init apiContext
            $apiContext = PaypalController::initApiContext();

            //Payer
            $payer = new \PayPal\Api\Payer();
            $payer->setPaymentMethod('paypal');

            //Total
            $amount = new \PayPal\Api\Amount();
            $total = 0;

            //Articulos
            $item_list = new \PayPal\Api\ItemList();

            foreach ($articulos as $articulo){
                $cantidad = $articulo["cantidad"];
                $articulo = Articulo::find($articulo["product_id"]);

                //Articulo
                if($articulo!=null){
                    $item = new \PayPal\Api\Item();
                    $item->name = $articulo->nombre;
                    $item->quantity = $cantidad;
                    $item->price = $articulo->precio;
                    $item->currency = 'EUR';
                    $item_list->addItem($item);

                    //total
                    $total += ($articulo->precio*$cantidad);
                }
            }

            //Total
            $amount->setTotal($total);
            $amount->setCurrency('EUR');

            //Transacciones
            $transaction = new \PayPal\Api\Transaction();
            $transaction->setAmount($amount);
            $transaction->setItemList($item_list);

            //Redirects
            $redirectUrls = new \PayPal\Api\RedirectUrls();
            $redirectUrls->setReturnUrl("http://localhost:8000/paypal/success")
                ->setCancelUrl("http://localhost:8000/paypal/cancel");
            //Pago - set
            $payment = new \PayPal\Api\Payment();
            $payment->setIntent('sale')
                ->setPayer($payer)
                ->setTransactions(array($transaction))
                ->setRedirectUrls($redirectUrls);

            // Creación de pago
            try {
                $payment->create($apiContext);
                //echo $payment;

                // update checkout con payment_id
                $checkout = Checkout::find($checkout_id);
                $checkout->payment_id = $payment->getId();
                $checkout->payment_method = $payment->getPayer()->payment_method;
                $checkout->save();

                //Redirect a Paypal
                return Redirect::to($payment->getApprovalLink());
            }
            catch (\PayPal\Exception\PayPalConnectionException $ex) {
                echo $ex->getData();
            }
        }

        //si hubo algun problema
        return view('carrito.error');
    }


    public static function initApiContext(){

        $apiContext = new \PayPal\Rest\ApiContext(
            new \PayPal\Auth\OAuthTokenCredential(
                'AUqFAtJKC76sT63tvAdifyEV3jDAWiSPg9D5ChWFJ6s2CkxUG8hgBdqQNdnTRZBkzA7FPJI3AY6MR8hq',     // ClientID
                'EDQf7WgwcNmr-yLEEFzB2K8Xm1gCTHrhk3JKl8VvpwD0QxRyV1mbizN7Zn3wup9YgoNG1BGR-OArK9ci'      // ClientSecret
            )
        );
        $apiContext->setConfig(
            array(
                'mode' => 'live',
            )
        );
        return $apiContext;
    }
}
