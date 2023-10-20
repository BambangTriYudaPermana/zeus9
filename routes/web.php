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

Route::get('/', function () {
    // return view('welcome');
    return view('front.main');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('/', 'App\Http\Controllers\Transaction\DashboardController');

Route::post('/get_payout/', 'App\Http\Controllers\Transaction\PayoutController@getPayout');

Route::resource('/transaction', 'App\Http\Controllers\Transaction\TransactionController');
Route::post('/sum_amout/', 'App\Http\Controllers\Transaction\AmountController@sum_amount');
Route::post('/topup/', 'App\Http\Controllers\Transaction\AmountController@topup');

// management
Route::resource('/address', 'App\Http\Controllers\Management\AddressController');

// game
Route::resource('/slide', 'App\Http\Controllers\Game\SlideController');
Route::resource('/trenball', 'App\Http\Controllers\Game\TrenballController');
Route::post('/play-tb/', 'App\Http\Controllers\Game\TrenballController@PlayTrenBall');

Route::resource('/slot', 'App\Http\Controllers\Game\SlotController');