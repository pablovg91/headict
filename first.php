<?php
// 1. Autoload the SDK Package. This will include all the files and classes to your autoloader
require __DIR__  . '/vendor/autoload.php';
// 2. Provide your Secret Key. Replace the given one with your app clientId, and Secret
// https://developer.paypal.com/webapps/developer/applications/myapps
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
// 3. Lets try to create a Payment
// https://developer.paypal.com/docs/api/payments/#payment_create
$payer = new \PayPal\Api\Payer();
$payer->setPaymentMethod('paypal');


$amount = new \PayPal\Api\Amount();
$amount->setTotal('0.20');
$amount->setCurrency('EUR');

$item_list = new \PayPal\Api\ItemList();
$item1 = new \PayPal\Api\Item();
$item1->name = "producto ejemplo 1";
$item1->quantity = 1;
$item1->price = '0.10';
$item1->currency = 'EUR';
$item_list->addItem($item1);

$item2 = new \PayPal\Api\Item();
$item2->name = "producto ejemplo 2";
$item2->quantity = 1;
$item2->price = '0.10';
$item2->currency = 'EUR';
$item_list->addItem($item2);



$transaction = new \PayPal\Api\Transaction();
$transaction->setAmount($amount);
$transaction->setItemList($item_list);

$redirectUrls = new \PayPal\Api\RedirectUrls();
$redirectUrls->setReturnUrl("http://localhost:8000/paypal/success")
    ->setCancelUrl("http://localhost:8000/paypal/cancel");

$payment = new \PayPal\Api\Payment();
$payment->setIntent('sale')
    ->setPayer($payer)
    ->setTransactions(array($transaction))
    ->setRedirectUrls($redirectUrls);


// 4. Make a Create Call and print the values
try {
    $payment->create($apiContext);
    echo $payment;
    echo "\n\nRedirect user to approval_url: " . $payment->getApprovalLink() . "\n";
}
catch (\PayPal\Exception\PayPalConnectionException $ex) {
    // This will print the detailed information on the exception.
    //REALLY HELPFUL FOR DEBUGGING
    echo $ex->getData();
}