@extends('layouts.app')

@section('header', 'MyFeed')

@section('content')

    <div class="bs-component">
        @foreach ($blogs as $blog)
            <div class="card border-primary mb-3" style="width: 100%;display: inline-block;">
                <div class="card-body" style="display: inline-block;width: 30%;float: left;">
                    <h4 class="card-title"><a href="{{ route('blogs.show', $blog) }}">{{ $blog->display_name }}</a></h4>
                    <h6 class="card-title"><a href="{{ route('blogs.show', $blog) }}" style="text-decoration: none;">{{ $blog->name }}</a></h6>
                    <p class="text-body" style="margin-top: 20px;"><small>{{ $blog->description }}</small></p>
                </div>
                @php
                    $post = $blog->posts()->orderBy('created_at', 'desc')->limit(4)->get();
                    $post_cnt = count($post);
                @endphp
                @if($post_cnt > 0)
                    @foreach($post as $post)
                        <div class="card-body" style="display: inline-block; width: 17%; float: left;">
                            @if($post->img_link)
                                <a href="{{ route('posts.show', $post) }}"><img src="{{ '/images/'. $post->img_link }}" style="width: 72%; border-radius: 70%; margin: 10px" alt="images"></a>
                            @else
                                <a href="{{ route('posts.show', $post) }}"><img src="{{ '/images/no_image.jpg' }}" style="width: 72%; border-radius: 70%; margin: 10px" alt="images"></a>
                            @endif
                            <a href="{{ route('posts.show', $post) }}" style="text-decoration: none;"><p class="text-body"><small>{{ $post->title }}</small></p></a>
                        </div>
                    @endforeach
                @else
                    <div class="card-body" style="display: inline-block; width: 48%; float: left;">
                        <p class="text-body-secondary">No posts</p>
                    </div>
                @endif
            </div>
        @endforeach
        <div class="d-grid gap-2">
            <button class="btn btn-lg btn-primary" type="button" onclick="location.href='{{ route('blogs.create') }}'">+ New Feed</button>
        </div>
    </div>

@endsection
