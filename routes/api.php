<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post('new-carret-cv','CareerController@store')->name('api.store.career');
Route::post('new-order-web-shop','OrdersController@store')->name('api.store.order.new');

Route::post('pobaraj-sovet','PobarajSovetController@pobarajsovet')->name('api.pobaraj.sovet');

Route::post('send-email-order-success/{id}/{token}','PaymentController@sendEmailOrder')->name('api.send.email.success');