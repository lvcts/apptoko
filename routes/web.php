<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ListController;

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

Route::get('/', function () {
    return view('admin.index');
});
// Route::get('/scan', function () {
//     return view('admin.scan');
// });
Route::get('/scan', [App\Http\Controllers\RacunController::class, 'index']);
Route::get('list/cari', [App\Http\Controllers\ListController::class, 'cari']);
// Route::delete('list/{item}', [App\Http\Controllers\ListController::class, 'delete']);
Route::resource('list', ListController::class);
Route::get('/scan/cari', [App\Http\Controllers\RacunController::class, 'scan']);
