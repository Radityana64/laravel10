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

Route::get('/centre-point/data', [App\Http\Controllers\Backend\DataController::class,'centrepoint'])->name('centre-point.data');
Route::get('/spot/data', [App\Http\Controllers\Backend\DataController::class,'spot'])->name('spot.data');

Route::resource('centre-point', (App\Http\Controllers\Backend\CentrePointController::class));
Route::resource('spot', (App\Http\Controllers\Backend\SpotController::class));

Route::get('/spots',[\App\Http\Controllers\HomeController::class,'spots'])->name('spots');
Route::get('/detail-spot/{id}',[\App\Http\Controllers\HomeController::class,'detailSpot'])->name('detail-spot');