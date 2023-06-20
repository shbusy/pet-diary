<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    // 메인 진입시 로그인여부 처리
    public function index(Blog $blog) {
        $msg = "";
        if (auth()->guest()) {
            $msg = "guest";
        } else if(auth()->check()) {
            $msg = "member";
        }

        return view('welcome')
            ->with([
                'msg' => $msg,
            ]);
    }
}
