<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/', 'ArticulosController@index');

Route::resource('articulos', 'ArticulosController');

Route::resource('categorias', 'CategoriasController');


//carrito - checkout
Route::get('/cart', 'CarritoController@index')->name('cart');
Route::get('/checkout', 'CarritoController@startCheckout')->name('startCheckout');
Route::post('/checkout', 'CarritoController@checkout');



//PAYPAL

Route::get('/paypal/success', 'PaypalController@success');