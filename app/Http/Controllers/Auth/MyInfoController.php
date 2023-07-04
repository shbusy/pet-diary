<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class MyInfoController extends Controller
{
    // 회원정보수정 폼
    public function showEditForm(User $user) {
        return view('auth.edit');
    }

    // 회원정보수정
    public function update(Request $request, User $user)
    {
        return back();
    }

    // 회원탈퇴처리
    public function destroy(User $user) {
        return back();
    }

    public function subList() {
        $subList = "";
        return $subList;
    }
}
