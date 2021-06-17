<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers;

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

Route::get('/', [App\Http\Controllers\ObjectController::class, 'welcome']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\UserController::class, 'index'])->name('home');
Route::get('/update', [App\Http\Controllers\UserController::class, 'showUpdateInfo']);
Route::post('update', [App\Http\Controllers\UserController::class, 'updateInfo']);
Route::get('/newobject', [App\Http\Controllers\ObjectController::class, 'index']);
Route::post('newobject', [App\Http\Controllers\ObjectController::class, 'addObject']);
Route::get('/map', [App\Http\Controllers\MapController::class, 'index'])->name('map');
Route::post('change', [App\Http\Controllers\ObjectController::class, 'changeStatus']);
