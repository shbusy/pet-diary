@extends('layouts.app')

@section('header', $post->title)

@section('content')
    <header>
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
    @if($post->img_link)
        <article><img src="{{ '/images/'. $post->img_link }}" alt="image"></article>
    @endif
    <article>{{ $post->content }}</article>
@endsection
