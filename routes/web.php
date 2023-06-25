<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;

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

Route::controller(\App\Http\Controllers\Controller::class)
    ->group(function () {
        Route::get('/', 'index');
    });

Route::middleware('auth')->resource('blogs', \App\Http\Controllers\BlogController::class);

Route::controller(\App\Http\Controllers\SubscribeController::class)
    ->group(function () {
        Route::post('subscribe', 'subscribe')
            ->name('subscribe');
        Route::post('unsubscribe', 'unsubscribe')
            ->name('unsubscribe');
    });

Route::middleware('auth')->resource('blogs.posts', \App\Http\Controllers\PostController::class)
    ->shallow();
