@extends('layouts.app')

@section('title', '메인')

@section('header', 'Our cuties')

@section('content')
    @foreach ($randomPosts as $post)
        <div class="col-lg-4">
            <div class="bs-component">
                <div class="card mb-3">
                    <h5 class="card-header"><a href="{{ route('blogs.show', $post->blog) }}" style="text-decoration: none; color: #888;">{{ $post->blog->display_name }}</a></h5>
                    <div class="card-body">
                        <h6 class="card-subtitle text-muted">{{ $post->blog->user->name }}</h6>
                    </div>
                    <div>
                        @if($post->img_link)
                            <a href="{{ route('posts.show', $post) }}"><img src="{{ '/images/'. $post->img_link }}" alt="image" style="width: 100%; height: auto; display: block; padding: 10px;border-radius: 5%;"></a>
                        @endif
                    </div>

                    <div class="col-lg-12">
                        <div style="margin: 16px;">{{--본문--}}
                            <a class="list-group-item flex-column align-items-start">
                                <div class="d-flex w-100 justify-content-between">
                                    <h5 class="mb-1">{{ $post->title }}</h5>
                                    <small class="text-muted">{{ $post->created_at_format }}</small>
                                </div>
                                <div class="d-flex w-100 justify-content-between">
                                    <p class="mb-1">{{ $post->content }}</p>
                                </div>
                            </a>
                        </div>
                    </div>

                    <ul class="list-group list-group-flush">
                        @if($post->comments_count > 0)
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                Comment
                                <span class="badge bg-primary rounded-pill">{{ $post->comments_count }}</span>{{--댓글갯수--}}
                            </li>
                            @foreach($comments as $comment)
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <small>{{ $comment->user->name }} : {{ $comment->content }}</small>
                                </li>
                            @endforeach
                        @else
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                No comments
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    @endforeach
@endsection
