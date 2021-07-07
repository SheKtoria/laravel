<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ObjectController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\ChatController;
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
Route::get('/user-profile/{user_id}', [UserController::class, 'goToUserProfile']);
Route::get('/users', [UserController::class, 'showUsers']);
Route::get('/home', [UserController::class, 'index'])->name('home');
Route::get('/update', [UserController::class, 'showUpdateInfo'])->name('updateUser');
Route::post('update', [UserController::class, 'updateInfo']);
Route::get('get-location', [UserController::class, 'getLocation']);

Route::get('/newObject', [ObjectController::class, 'index'])->name('newObject');
Route::post('newObject', [ObjectController::class, 'addObject']);
Route::get('/changeStatus', [ObjectController::class, 'changeStatus']);
Route::get('/sorting/{type}', [ObjectController::class, 'sorting']);
Route::get('/main/{category}', [ObjectController::class, 'category']);

Route::get('/room', [ChatController::class, 'chatList']);
Route::post('messages', [ChatController::class, 'messageSend']);
Route::post('allMessages', [ChatController::class, 'getAllMessages']);
Route::get('/room/{room}', [ChatController::class, 'showRoom'])->name('chat');
Route::get('/start-chat',  [ChatController::class, 'startChat']);



