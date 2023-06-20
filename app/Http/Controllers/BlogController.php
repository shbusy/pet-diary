<?php

namespace App\Http\Controllers;

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
    public function index()
    {
        return view('blogs.index', [
            'blogs' => Blog::all()
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

        return view('blogs.show', [
            'blog' => $blog,
            'owned' => $user->blogs()->find($blog->id),
            'subscribed' => $blog->subscribers()->find($user->id)
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
