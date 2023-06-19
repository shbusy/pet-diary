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
