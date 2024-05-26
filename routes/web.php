<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ListController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\RacunController;









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




Route::group(['middleware' => ['guest']], function () {
    Route::get('/register', [App\Http\Controllers\RegisterController::class, 'index'])->name('register.show');
    Route::post('/register', [App\Http\Controllers\RegisterController::class, 'register'])->name('register.perform');

    Route::get('/login', [App\Http\Controllers\LoginController::class, 'index'])->name('login.index');
    Route::post('/login', [App\Http\Controllers\LoginController::class, 'login'])->name('login.authenticate');
});

Route::group(['middleware' => ['auth']], function () {
    Route::get('/', function () {
        return view('admin.index');
    });
    Route::get('/scan', [RacunController::class, 'index'])->name('scan');
    Route::post('/scan/add', [RacunController::class, 'addToCart'])->name('cart.add');
    Route::post('/scan/update', [RacunController::class, 'updateCart'])->name('scan.update');
    Route::get('/logout', [App\Http\Controllers\LogoutController::class, 'logout'])->name('logout.perform');
});



Route::resource('transaksi', TransaksiController::class);
Route::get('list/cari', [App\Http\Controllers\ListController::class, 'cari']);
// Route::delete('list/{item}', [App\Http\Controllers\ListController::class, 'delete']);
Route::resource('list', ListController::class);
Route::get('/scan/scan', [App\Http\Controllers\RacunController::class, 'scan']);
Route::get('/cari', [App\Http\Controllers\RacunController::class, 'cari']);
