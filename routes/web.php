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


Route::get('/', function(){
	return view('working');
})->name('shop.index');

//Route::get('/', 'HomeController@index')->name('shop.index');
Route::get('/products', 'ProductsController@products')->name('shop.products');
Route::get('/products/{slug}', 'ProductsController@show')->name('shop.product.view');
Route::get('/products/category/{slug}','ProductsController@byslug')->name('product.by.category');

Route::get('/packets', 'PackagesController@packages')->name('shop.packages');
Route::get('/packets/{slug}', 'PackagesController@show')->name('shop.package.view');
Route::get('/packages/category/{slug}','PackagesController@byslug')->name('product.by.package');


Route::get('about','AboutController@index')->name('shop.about');


Route::get('/nutrigenetika','NutrigenetikaController@index')->name('shop.nutrigenetika');

Route::get('/blog','BlogController@index')->name('shop.blog');
Route::get('/blog/{slug}','BlogController@show')->name('shop.blog.view');

Route::get('career',function(){
	return view('pages/careers');
})->name('shop.careers');

Route::get('faq',function(){
	return view('pages/faq');
})->name('shop.faq');
Route::get('cart','OrdersController@cart')->name('shop.cart');

Route::get('checkout/{id}-{token}','PaymentController@payment_pre_page')->name('shop.checkout');

Route::post('shop/payalert/payment-ok-url','PaymentController@ok_url')->name('shop.ok.payment');

Route::post('shop/payalert/payment-nok-url','PaymentController@nok_url')->name('shop.nok.payment');

Route::get('shop/payment-success/{id}-{token}','PaymentController@ok_redirect_final')->name('shop.payment.success');

Route::get('legal-info',function(){
	return view('pages/legalinfo');
})->name('shop.legal.info');
Route::get('payment-infos',function(){
	return view('pages/payments');
})->name('shop.payments.info');


