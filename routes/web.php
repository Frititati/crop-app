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
    return redirect('/dashboard');
});

Route::get('dashboard', 'App\Http\Controllers\User\UserDashboardController@index')->name('dashboard');

Route::post('user_send_coins', 'App\Http\Controllers\User\UserDashboardController@sendCoins');

Route::get('generation/manage/download_static', 'App\Http\Controllers\Management\GenerationController@downloadStatic');
Route::post('generation/manage/qr_scan_in', 'App\Http\Controllers\Management\GenerationController@qrScanIn');
Route::get('generation/manage/qr_scan_out', 'App\Http\Controllers\Management\GenerationController@qrScanOut');
Route::resource('generation/manage', 'App\Http\Controllers\Management\GenerationController');

// Route::get('coin/create', 'App\Http\Controllers\Coin\CoinGenerationController@create');

Route::get('qr_scan', 'App\Http\Controllers\Coin\CoinGenerationController@index')->name('qr_scan');
Route::post('qr_scan', 'App\Http\Controllers\Coin\CoinGenerationController@store');

Route::get('portfolio/selection', 'App\Http\Controllers\Portfolio\PortfolioSelectionController@index')->name('portfolio_selection');

Route::post('portfolio/selection', 'App\Http\Controllers\Portfolio\PortfolioSelectionController@store');

Route::get('charity/{category}', 'App\Http\Controllers\Charity\CharityViewController@category');

Route::get('charity', 'App\Http\Controllers\Charity\CharityViewController@index')->name('charity');

Route::get('shop_map', 'App\Http\Controllers\Shop\ShopViewController@index')->name('shop_map');

Route::resource('shop/manage', 'App\Http\Controllers\Management\ShopController', array("as" => "shop_manage"));
Route::resource('shop', 'App\Http\Controllers\Shop\ShopViewController');

Route::get('user_help', 'App\Http\Controllers\User\UserHelpController@user_help')->name('user_help');

Route::resource('user/manage', 'App\Http\Controllers\Management\UserController', array("as" => "user_manage"));

Route::resource('management', 'App\Http\Controllers\Management\GeneralController');

Route::get('/el', 'App\Http\Controllers\Link\LinkController@externalLinkDefault');
Route::get('/el/{code}', 'App\Http\Controllers\Link\LinkController@externalLink');

Route::resource('user_setting', 'App\Http\Controllers\User\UserSettingController');

Route::get('privacy_policy', 'App\Http\Controllers\User\PrivacyPolicyController@index')->name('privacy_policy');

// Route::get('test', 'App\Http\Controllers\Management\UserController@test');

require __DIR__.'/auth.php';
