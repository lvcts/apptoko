<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ListController;
use App\Http\Controllers\TransaksiController;








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
    Route::get('/scan', [App\Http\Controllers\RacunController::class, 'index']);
    Route::get('/cart', [App\Http\Controllers\CartController::class, 'index'])->name('cart');
    Route::post('/cart/add/{id}', [App\Http\Controllers\CartController::class, 'add'])->name('cart.add');
    Route::post('/cart/update/{id}', [App\Http\Controllers\CartController::class, 'update'])->name('cart.update');
    Route::post('/cart/remove/{id}', [App\Http\Controllers\CartController::class, 'remove'])->name('cart.remove');
    Route::get('/logout', [App\Http\Controllers\LogoutController::class, 'logout'])->name('logout.perform');
});



Route::resource('transaksi', TransaksiController::class);
Route::get('list/cari', [App\Http\Controllers\ListController::class, 'cari']);
// Route::delete('list/{item}', [App\Http\Controllers\ListController::class, 'delete']);
Route::resource('list', ListController::class);
Route::get('/scan/scan', [App\Http\Controllers\RacunController::class, 'scan']);
Route::get('/cari', [App\Http\Controllers\RacunController::class, 'cari']);
