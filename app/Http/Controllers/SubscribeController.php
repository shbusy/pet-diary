<?php

namespace App\Http\Controllers;

use App\Http\Requests\SubscribeRequest;
use App\Http\Requests\UnsubscribeRequest;
use App\Models\Blog;
use Illuminate\Http\Request;

class SubscribeController extends Controller
{
    public function subscribe(SubscribeRequest $request) {
        $user = $request -> user();
        $blog = Blog::find($request->blog_id);

        // subscriptions() 모델 User
        $user-> subscriptions()->attach($blog->id);

        return back();
    }

    public function unsubscribe(UnsubscribeRequest $request) {
        $user = $request -> user();
        $blog = Blog::find($request->blog_id);

        // subscriptions() User모델
        $user-> subscriptions()->detach($blog->id);

        return back();
    }
}
