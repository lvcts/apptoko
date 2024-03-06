<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ListController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\LoginController;




/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('admin.index');
// });

Route::group(['namespace' => 'App\Http\Controllers'], function () {
    /**
     * Home Routes
     */
    Route::get('/', function () {
        return view('admin.transaksi');
    });

    Route::group(['middleware' => ['guest']], function () {
        /**
         * Register Routes
         */
        Route::get('/register', 'RegisterController@index')->name('register.show');
        Route::post('/register', 'RegisterController@register')->name('register.perform');

        /**
         * Login Routes
         */
        Route::get('/login', 'LoginController@index')->name('login.index');
        Route::post('/login', 'LoginController@login')->name('login.authenticate');
    });

    Route::group(['middleware' => ['auth']], function () {
        /**
         * Logout Routes
         */
        Route::get('/logout', 'LogoutController@perform')->name('logout.perform');
    });
});
// Route::group(['middleware' => ['guest']], function () {
/**
 * Login Routes
 */
// Route::get('/tes', 'LoginController@index')->name('login.index');
// Route::post('/tes', 'LoginController@login')->name('login.perform');
// });
// Route::  get('/auth', [App\Http\Controllers\AuthController::class, 'index']);
Route::get('/scan', [App\Http\Controllers\RacunController::class, 'index']);
Route::resource('transaksi', TransaksiController::class);
Route::get('list/cari', [App\Http\Controllers\ListController::class, 'cari']);
// Route::delete('list/{item}', [App\Http\Controllers\ListController::class, 'delete']);
Route::resource('list', ListController::class);
Route::get('/scan/cari', [App\Http\Controllers\RacunController::class, 'scan']);
