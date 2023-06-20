<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Post;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;

class PostController extends Controller
{
    public function __construct () {
        $this->authorizeResource(Post::class, 'post', [
            'except' => ['create', 'store']
        ]);

        $this->middleware('can:create,App\Models\Post,blog')
            ->only(['create', 'store']);
    }

    /**
     * 글 목록
     */
    public function index(Blog $blog)
    {
        return view('blogs.posts.index', [
            'posts' => $blog->posts()->latest()->paginate()
        ]);
    }

    /**
     * 글쓰기 폼
     */
    public function create(Blog $blog)
    {
        return view('blogs.posts.create', [
            'blog' => $blog
        ]);
    }

    /**
     * 글쓰기
     */
    public function store(StorePostRequest $request, Blog $blog)
    {
        $post = $blog->posts()->create(
            $request->only(['title', 'content'])
        );

        return to_route('posts.show', $post);
    }

    /**
     * 글 본문
     */
    public function show(Post $post)
    {
        return view('blogs.posts.show', [
            'post' => $post
        ]);
    }

    /**
     * 글 수정 폼
     */
    public function edit(Post $post)
    {
        return view('blogs.posts.edit' ,[
            'post' => $post
        ]);
    }

    /**
     * 글 수정
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        $post->update(
            $request->only(['title', 'content'])
        );

        return to_route('posts.show', $post);
    }

    /**
     * 글 삭제
     */
    public function destroy(Post $post)
    {
        $post -> delete();

        return to_route('blogs.posts.index', $post -> blog);
    }
}
