@extends('layouts.app')

@section('title', $post->title)

@section('content')
    <header>
        <h1>{{ $post->title }}</h1>

        @can(['update', 'delete'], $post)
            <p class="bs-component">
                <button type="button" onclick="location.href='{{ route('posts.edit', $post) }}'" class="btn btn-warning">edit</button>
            </p>
            <form action="{{ route('posts.destroy', $post) }}" method="POST">
                @csrf
                @method('DELETE')
                <p class="bs-component">
                    <button type="submit" class="btn btn-danger">delete</button>
                </p>
            </form>
        @endcan
    </header>

    <article><img src="{{ '/images/'. $post->img_link }}" alt="image"></article>
    <article>{{ $post->content }}</article>
@endsection
