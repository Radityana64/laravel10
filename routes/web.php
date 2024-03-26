<?php

use Illuminate\Support\Facades\Route;


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
    return view('home');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/belum-buat', [App\Http\Controllers\HomeController::class, 'belum_buat'])->name('belum-buat');
Route::get('/map-tugas1', [App\Http\Controllers\HomeController::class, 'map_tugas1'])->name('map-tugas1');

Route::get('/center-point/data', [App\Http\Controllers\Backend\DataController::class,'centerpoint'])->name('center-point.data');
Route::get('/spot/data', [App\Http\Controllers\Backend\DataController::class,'spot'])->name('spot.data');

Route::resource('spot', (App\Http\Controllers\Backend\SpotController::class));
Route::resource('center-point', (App\Http\Controllers\Backend\CenterPointController::class));
