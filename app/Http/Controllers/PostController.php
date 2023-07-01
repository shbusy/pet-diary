<?php

namespace App\Http\Controllers;

use App\Helpers\DateHelper;
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
        return view('blogs.show', [
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
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'img' => 'image|mimes:jpeg,png,jpg,gif',
        ]);

        $request_post = $request->only(['title', 'content']);

        if($request->hasFile('img')) {
            $img = $request->file('img');
            $img_path = $img->store('/', 'custom');
            $request_post['img_link'] = $img_path;
        }

        $post = $blog->posts()->create($request_post);

        return to_route('posts.show', $post);
    }

    /**
     * 글 본문
     */
    public function show(Post $post)
    {
        $post->created_at_format = DateHelper::DateFormat($post->created_at);

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
        $request_post = $request->only(['title', 'content']);

        if($request->hasFile('img') != null) {
            $img = $request->file('img');
            $img_path = $img->store('/', 'custom');
            $request_post['img_link'] = $img_path;
        }

        $post->update($request_post);

        return to_route('posts.show', $post);
    }

    /**
     * 글 삭제
     */
    public function destroy(Post $post)
    {
        $post -> delete();

        return to_route('blogs.show', $post -> blog);
    }
}
