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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/update', [App\Http\Controllers\HomeController::class, 'showUpdateInfo']);
Route::post('update', [App\Http\Controllers\HomeController::class, 'updateInfo']);
Route::get('/newobject', [App\Http\Controllers\ObjectController::class, 'index']);
Route::post('newobject', [App\Http\Controllers\ObjectController::class, 'addObject']);
Route::get('/map', [App\Http\Controllers\MapController::class, 'index'])->name('map');
