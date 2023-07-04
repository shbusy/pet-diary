<?php

use Illuminate\Support\Facades\Route;

// 회원/비회원 접근시 차이를 두도록 미들웨어로 지정
Route::controller(\App\Http\Controllers\Auth\RegisterController::class)->group(function () {
    Route::middleware('guest')->group(function () {
        // GET의 register 요청에 대해서는 회원가입 뷰를 반환 이름은 register로 지정
        Route::get('/register', 'showRegistrationForm')
            ->name('register');
        // POST의 register 요청에 대해서는 회원가입 프로세스를 반환 이름은 register로 지정
        Route::post('/register', 'register');
    });
});

// 로그인, 로그아웃 라우터 설정
Route::controller(\App\Http\Controllers\Auth\LoginController::class)->group(function () {
    Route::middleware('guest')->group(function () {
        Route::get('/login', 'showLoginForm')
            ->name('login');
        Route::post('/login', 'login');
    });
    Route::post('/logout', 'logout')
        ->name('logout')
        ->middleware('auth');
});

Route::middleware('auth')->controller( \App\Http\Controllers\Auth\MyInfoController::class)
    ->group(function () {
        Route::get('myinfo/edit', 'showEditForm')
            ->name('myinfo.edit');
        Route::post('myinfo/update', 'update')
            ->name('myinfo.update');
        Route::post('myinfo/destroy', 'destroy')
            ->name('myinfo.destroy');
        Route::get('myinfo/subList', 'showEditForm')
            ->name('myinfo.subList');
    });
