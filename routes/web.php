<?php

use Illuminate\Support\Facades\Route;
use App\Http\Cotrollers;
use App\Models\User;
use app\Http\Middleware;

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

Route::middleware('auth')->group(function () {
    Route::get('users/show/{id}', [App\Http\Controllers\UserController::class, 'show'])->name('show');
    Route::get('users/edit/{id}', [App\Http\Controllers\UserController::class, 'edit'])->name('edit');
    Route::post('users/update/{id}', [App\Http\Controllers\UserController::class, 'update'])->name('users.update');
});    

Route::get('/', function () {
    return view('top');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/matching', [App\Http\Controllers\MatchingController::class, 'index'])->name('matching');

Route::middleware('auth')->group(function () {
    Route::post('chat/show', [App\Http\Controllers\ChatController::class,'show'])->name('chat.show');
    Route::post('chat/chat', [App\Http\Controllers\ChatController::class, 'chat'])->name('chat.chat');
});