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
    return view('home');
});

Route::get('/karakter', [App\Http\Controllers\MainController::class, 'dataKarakter']);
Route::post('/karakter', [App\Http\Controllers\MainController::class, 'hasilFilterKarakter']);
Route::get('/karakter/{nama}', [App\Http\Controllers\MainController::class, 'profile']);

Route::get('/film', [App\Http\Controllers\MainController::class, 'dataFilm']);
Route::post('/film', [App\Http\Controllers\MainController::class, 'hasilFilterFilm']);