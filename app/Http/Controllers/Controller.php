<?php

namespace App\Http\Controllers;

use App\Helpers\DateHelper;
use App\Models\Blog;
use App\Models\Post;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    /**
     * 랜덤한 글 3개를 메인에 노출
     */
    public function index(Blog $blog) {
        $randomPosts = Post::getRandomPosts();

        foreach($randomPosts as $post) {
            $post->created_at_format = DateHelper::DateFormat($post->created_at);
        }

        return view('welcome', compact('randomPosts'));
    }
}
