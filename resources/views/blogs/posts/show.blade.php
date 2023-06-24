@extends('layouts.app')

@section('header', $post->blog->name)

@section('content')
    <div class="col-lg-4">
        @can(['update', 'delete'], $post)
            <p class="bs-component">
                <button type="button" onclick="location.href='{{ route('posts.edit', $post) }}'" class="btn btn-warning">edit</button>
                <button type="submit" class="btn btn-danger" onclick="if(confirm('글을 삭제하시겠습니까?')) { $('#delete_form').submit(); }">delete</button>
            </p>
            <form action="{{ route('posts.destroy', $post) }}" method="POST" id="delete_form">
                @csrf
                @method('DELETE')

            </form>
        @endcan

        @if($post->img_link)
            <article><img src="{{ '/images/'. $post->img_link }}" alt="image" style="width: 100%; border-radius: 5%; margin-bottom: 10px;"></article>
        @endif
        <h2>{{ $post->title }}</h2>
        <figure>
            <blockquote class="blockquote">
                <p class="mb-0">{{ $post->content }}</p>
            </blockquote>
        </figure>
    </div>
@endsection
