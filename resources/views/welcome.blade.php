@extends('layouts.app')

@section('title', '메인')

@section('header', 'Our cuties')

@section('content')
    @foreach ($randomPosts as $post)
        <div class="col-lg-4">
            <div class="bs-component">
                <div class="card mb-3">
                    <h4 class="card-header"><a href="{{ route('blogs.show', $post->blog) }}" style="text-decoration: none; color: #888;">{{ $post->blog->display_name }}</a></h4>
                    <div class="card-body">
                        <h5 class="card-title"><a href="{{ route('posts.show', $post) }}" style="text-decoration: none; color: #888;">{{ $post->title }}</a></h5>
                        <h6 class="card-subtitle text-muted">{{ $post->blog->user->name  }}</h6>
                    </div>
                    <div>
                        @if($post->img_link)
                            <a href="{{ route('posts.show', $post) }}"><img src="{{ '/images/'. $post->img_link }}" alt="image" style="width: 100%; height: auto; display: block; padding: 10px;border-radius: 5%;"></a>
                        @endif
                    </div>
                    <div class="card-body">
                        <p>{{ $post->content }}</p>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">댓글작성을 오픈 준비중이예요!</li>
                    </ul>
                    <div class="card-footer text-muted">
                        {{ $post->created_at_format }}
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection
