<?php

use App\Http\Controllers\StripeController;
use App\Http\Controllers\WebHookController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'payment', 'as' => 'payment.', 'middleware' => 'auth'], function () {
    Route::group(['prefix' => 'charge', 'as' => 'charge.'], function () {
        Route::get('/charge', [StripeController::class, 'charge'])->name('index');
        Route::post('/charge/{product}/{price}', [StripeController::class, 'chargePost'])->name('post');
    });
    // Route::group(['prefix' => 'subscription', 'as' => 'sub.'], function () {
    //     Route::get('/charge', [StripeController::class, 'charge'])->name('index');
    //     Route::post('/charge/{product}/{price}', [StripeController::class, 'chargePost'])->name('post');
    // });
});

Route::post('/stripe/webhook', [WebHookController::class, 'handleWebHook']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
