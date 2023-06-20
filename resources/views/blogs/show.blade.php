@extends('layouts.app')

@section('title', $blog->display_name)

@section('content')
    <header>
        <h3>{{ $blog->display_name }}</h3>

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

    </header>
@endsection
