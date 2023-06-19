<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function showLoginForm() {
        return view('auth.login');
    }

    public function login(LoginRequest $request) {

         auth()->attempt(); // 로그인
        /*if (! auth()->attempt($request->validated(), $request->boolean('remember'))) { // 유효성검사, 로그인유지 실패시 에러화면으로 던져
            return back()->withErrors([
                'failed' => __('auth.failed'),
            ]);
        }*/

        return redirect()->intended(); // 로그인이 끝나면 다시 접속하려던 페이지로 돌아갈 것
    }

    public function logout() {
        auth()->logout(); // 로그아웃

        session()->invalidate(); // 세션ID재생성, 모든 세션값을 삭제
        session()->regenerateToken(); // CSRF TOKEN 갱신

        return redirect()->to(RouteServiceProvider::HOME);
    }
}
