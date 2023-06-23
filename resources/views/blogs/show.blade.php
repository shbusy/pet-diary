@extends('layouts.app')

@section('header', $blog->display_name)

@section('content')
    <header>
        @unless($owned)
            @unless($subscribed)
                <form action="{{ route('subscribe') }}" method="POST">
                    @csrf
                    <input type="hidden" name="blog_id" value="{{ $blog->id }}">

                    <button>구독</button>
                </form>
            @else
                <form action="{{ route('unsubscribe') }}" method="POST">
                    @csrf
                    <input type="hidden" name="blog_id" value="{{ $blog->id }}">

                    <button>구독취소</button>
                </form>
            @endunless
        @endunless

        @auth
            @can(['update', 'delete'], $blog)
                <p class="bs-component">
                    <button type="button" class="btn btn-outline-primary" onclick="location.href='{{ route('blogs.edit', $blog) }}'">Setting</button>
                </p>
            @endcan
        @endauth
    </header>

    @auth
        <ul>
            @can('create', [\App\Models\Post::class, $blog])
                <div class="d-grid gap-2">
                    <button class="btn btn-lg btn-primary" type="button" onclick="location.href='{{ route('blogs.posts.create', $blog) }}'">+ New Post</button>
                </div>
            @endcan
        </ul>
    @endauth

    @foreach ($posts as $post)
        <div class="col-lg-4">
            <div class="bs-component">
                <div class="card mb-3">
                    <div class="card">
                        <div class="card-body">
                            <h5><p>{{ $post->created_at_format }}</p><p><small><a href="{{ route('posts.show', $post) }}" style="text-decoration: none; color: #888;">{{ $post->title }}</a></small></p></h5>
                            @if($post->img_link)
                                <div>
                                    <a href="{{ route('posts.show', $post) }}"><img src="{{ '/images/'. $post->img_link }}" alt="images" style="width: 100%; border-radius: 3%;"></a>
                                </div>
                            @endif
                        </div>
                    </div>

                </div>
            </div>
        </div>
    @endforeach

    {{ $posts->links('pagenation.custom') }}

@endsection
