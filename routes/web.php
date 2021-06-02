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

Route::get('portfolio/selection', 'App\Http\Controllers\Portfolio\PortfolioSelectionController@index')->name('portfolio_selection');

Route::post('portfolio/selection', 'App\Http\Controllers\Portfolio\PortfolioSelectionController@store');

Route::get('charity/{category}', 'App\Http\Controllers\Charity\CharityViewController@category');

Route::get('charity', 'App\Http\Controllers\Charity\CharityViewController@index')->name('charity');

require __DIR__.'/auth.php';
