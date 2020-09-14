<?php

use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });

//Route::view('/', 'welcome');
Route::get('/', 'WelcomePageController@index')->name('welcome.index');

Route::get('/shop', 'ShopController@index')->name('shop.index');
Route::get('/shop/{product}', 'ShopController@show');

//Route::view('/product', 'product');

Route::get('/cart', 'CartController@index')->name('cart.index');
Route::post('/cart', 'CartController@store')->name('cart.store');
Route::delete('/cart/{product}', 'CartController@destroy')->name('cart.destroy');
///quantity
Route::patch('/cart/{product}', 'CartController@update')->name('cart.update');

Route::post('/cart/switchToSaveForLater/{product_id}/{user_id}','CartController@switchToSaveForLater')->name('cart.switchToSaveForLater');

//return proucts in save for later cart
Route::get('/saved','SaveForLaterController@index')->name('saved.index');
//remove item from save cart
Route::delete('/saved/{product}','SaveForLaterController@destroy')->name('saved.destroy');

Route::get('/checkout', 'CheckoutController@index')->name('checkout.index');

Route::post('/checkout', 'CheckoutController@store')->name('checkout.store');


Route::view('/thankyou', 'thankyou');



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

