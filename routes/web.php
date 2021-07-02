<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ObjectController;

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

Route::get('/', [ObjectController::class, 'welcome']);

Auth::routes();
Route::get('/users', [UserController::class, 'showUsers']);
Route::get('/home', [UserController::class, 'index'])->name('home');
Route::get('/update', [UserController::class, 'showUpdateInfo'])->name('update');
Route::post('update', [UserController::class, 'updateInfo']);
Route::get('/newobject', [ObjectController::class, 'index'])->name('newobject');
Route::post('newobject', [ObjectController::class, 'addObject']);
Route::get('/change', [ObjectController::class, 'changeStatus']);
Route::get('/sorting/{type}', [ObjectController::class, 'sorting']);
Route::get('/main/{category}', [ObjectController::class, 'category']);
Route::get('/room', [App\Http\Controllers\ChatController::class, 'chatList']);
Route::post('messages', [App\Http\Controllers\ChatController::class, 'messageSend']);
Route::get('/room/{room}', [App\Http\Controllers\ChatController::class, 'showRoom'])->name('chat');
Route::get('/start-chat',  [App\Http\Controllers\ChatController::class, 'startChat']);


