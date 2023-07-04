@extends('layouts.app')

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

                    @include('layouts.content'){{--본문--}}

                    <ul class="list-group list-group-flush">
                        @if($post->comments_count > 0)
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <small>Comment</small>
                                <span class="badge bg-primary rounded-pill">{{ $post->comments_count }}</span>{{--댓글갯수--}}
                            </li>
                            @foreach($post->comments as $comment)
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <small>
                                        <strong>{{ $comment->user->name }}</strong> <small class="text-muted">{{ $comment->created_at_format }}</small>
                                        <br>{{ $comment->content }}
                                    </small>
                                </li>
                            @endforeach
                            @if($post->comments_count > 2)
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <small><a href="{{ route('posts.show', $post) }}" style="text-decoration: none; color: #888;">+ More</a></small>
                                </li>
                            @endif
                        @else
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <small>No comments</small>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    @endforeach
@endsection
