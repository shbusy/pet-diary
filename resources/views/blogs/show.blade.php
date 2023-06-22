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
            <ul>
                @can(['update', 'delete'], $blog)
                    <li><a href="{{ route('blogs.edit', $blog) }}">블로그 관리</a></li>
                @endcan
            </ul>
        @endauth

        @auth
            <ul>
                @can('create', [\App\Models\Post::class, $blog])
                    <li><a href="{{ route('blogs.posts.create', $blog) }}">글쓰기</a></li>
                @endcan
            </ul>
        @endauth

        <ul>
            @foreach ($posts as $post)
                <li>
                    <a href="{{ route('posts.show', $post) }}">{{ $post->title }}</a>
                </li>
            @endforeach
        </ul>

        {{ $posts->links() }} {{-- 페이징 필요할때 컨트롤러에서 pagenate 주석 해제 --}}

    </header>
@endsection
