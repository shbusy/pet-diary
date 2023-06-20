<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Providers\RouteServiceProvider;

class LoginController extends Controller
{
    public function showLoginForm() {
        return view('auth.login');
    }

    public function login(LoginRequest $request) {

        $credentials = $request->validate([
            'email'=> ['required', 'email', 'exists:users', 'max:255'],
            'password' => ['required', 'max:255']
        ]);

        if (!auth()->attempt($credentials)) {
            return with([
                'msg' => "f"
            ]);
        }

        $request->session()->regenerate();
        return with([
            'msg' => "s",
            'url' => url()->previous()
        ]);
    }

    public function logout() {
        auth()->logout(); // 로그아웃

        session()->invalidate(); // 세션ID재생성, 모든 세션값을 삭제
        session()->regenerateToken(); // CSRF TOKEN 갱신

        return redirect()->to(RouteServiceProvider::HOME);
    }
}
