<?php

namespace App\Http\Controllers;

use App\Checkout;
use Illuminate\Support\Facades\DB;
use PayPal\Api\Payment;
use Illuminate\Http\Request;
use App\Articulo;
use Illuminate\Support\Facades\Redirect;
use PayPal\Api\PaymentExecution;

class PaypalController extends Controller
{
    public function __construct()
    {
        // do something
    }

    //Pago realizado con éxito
    public function success(Request $request){

        //init apiContext
        $apiContext = PaypalController::initApiContext();

        //req
        $paymentId = $request->input('paymentId');
        $payerID = $request->input('PayerID');

        // Pago
        $payment = Payment::get($paymentId, $apiContext);

        // Execution
        $execution = new PaymentExecution();
        $execution->setPayerId($payerID);

        try {
            // $$$$$$$ DINERO DINERO DINERO DINERO DINERO DINERO $$$$$$$$$
            // $$$$$$$ CLIN CLUN CLAN CLIN CLAN CLUN $$$$$$$$$$$$$$$$$$$$$
            $result = $payment->execute($execution, $apiContext);

            try {
                $payment = Payment::get($paymentId, $apiContext);
            } catch (\Exception $ex) {
                $ex->getMessage();
            }
        } catch (\Exception $ex) {
            $ex->getMessage();
        }


        //COMPRA APROBADA
        if($payment->getState()=="approved"){
            
            //checkout
            $checkout = Checkout::where('payment_id', $payment->getId())->first();

            //si no está aprobada ya
            if(!$checkout->payment_done) {

                //payer info
                $payment_payer = $payment->getPayer();
                $payment_payer_info = $payment_payer->getPayerInfo();

                //transition id
                $payment_transactions = $payment->getTransactions();
                $payment_transaction_related_resources = $payment_transactions[0]->getRelatedResources();
                $payment_transaction_sale = $payment_transaction_related_resources[0]->getSale();
                $payment_transaction_id = $payment_transaction_sale->getId();

                //update checkout
                $checkout->payment_done = true;
                $checkout->transaction_id = $payment_transaction_id;
                $checkout->payer_id = $payment_payer_info->payer_id;
                $checkout->payer_email = $payment_payer_info->email;
                $checkout->first_name = $payment_payer_info->first_name;
                $checkout->last_name = $payment_payer_info->last_name;
                $checkout->update();
            }

            return view('compra.success');
        }else{
            //si hubo algun problema
            return view('compra.error');
        }
    }

    //Procesa el pago desde Paypal
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
