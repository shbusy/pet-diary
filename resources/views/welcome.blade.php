@extends('layouts.app')

@section('title', '메인')

@section('content')
    @foreach ($randomPosts as $post)
        <h3>{{ $post->title }}</h3>
        <p>{{ $post->content }}</p>
    @endforeach
@endsection
