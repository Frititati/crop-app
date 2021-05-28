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
    return view('welcome');
});

Route::get('dashboard', 'App\Http\Controllers\User\UserDashboardController@index')->name('dashboard');

Route::get('coin/scan', 'App\Http\Controllers\Coin\CoinGenerationController@index')->name('qr_scan');

Route::get('coin/create', 'App\Http\Controllers\Coin\CoinGenerationController@create');

Route::post('coin/link', 'App\Http\Controllers\Coin\CoinGenerationController@store');

Route::get('portofolio/selection', 'App\Http\Controllers\Portfolio\PortofolioSelectionController@selection')->name('portfolio_selection');

require __DIR__.'/auth.php';
