<?php

namespace App\Http\Controllers;

use App\Helpers\DateHelper;
use App\Models\Blog;
use App\Http\Requests\StoreBlogRequest;
use App\Http\Requests\UpdateBlogRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function __construct() {
        // BlogPolicy의 정책클래스 메서드를 컨트롤러와 매칭
        $this->authorizeResource(Blog::class, 'blog');
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Blog $blog)
    {
        $user_id = auth()->id(); // 현재 접속한 유저의 아이디

        return view('blogs.index', [
            'blogs' => $blog->where('user_id', $user_id)->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('blogs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBlogRequest $request)
    {
        $user = $request->user();

        $user->blogs()->create($request->validated());

        return to_route('blogs.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, Blog $blog)
    {
        $user = $request->user();

        $posts = $blog->posts()->latest()->paginate(6);

        foreach($posts as $post) {
            $post->created_at_format = DateHelper::DateFormat($post->created_at);
        }

        return view('blogs.show', [
            'blog' => $blog,
            'owned' => $user->blogs()->find($blog->id),
            'subscribed' => $blog->subscribers()->find($user->id),
            'posts' => $posts
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Blog $blog)
    {
        if(! Gate::allows('update-blog', $blog)) {
            abort(403);
        }

        return view('blogs.edit', [
            'blog' => $blog
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBlogRequest $request, Blog $blog)
    {
        $blog->update($request->validated());

        return to_route('blogs.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blog $blog)
    {
        $blog->delete();

        return to_route('blogs.index');
    }
}
