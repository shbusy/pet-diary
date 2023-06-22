@extends('layouts.app')

@section('title', '메인')

@section('header', 'Our cuties')

@section('content')
    @foreach ($randomPosts as $post)
        <div class="col-lg-4">
            <div class="bs-component">
                <div class="card mb-3">
                    <h4 class="card-header">{{ $post->blog->display_name }}</h4>
                    <div class="card-body">
                        <h5 class="card-title">{{ $post->title }}</h5>
                        <h6 class="card-subtitle text-muted">{{ $post->blog->user->name  }}</h6>
                    </div>
                    <div>
                        @if($post->img_link)
                            <img src="{{ '/images/'. $post->img_link }}" alt="image" style="width: 100%; height: auto; display: block;">
                        @endif
                    </div>
                    <div class="card-body">
                        <p>{{ $post->content }}</p>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">댓글 상위 2개 노출 (작업중)</li>
                        <li class="list-group-item">아직 댓글이 없어요. 댓글을 달아주세요 (작업중)</li>
                    </ul>
                    <div class="card-footer text-muted">
                        {{ "몇시간 전 작성" }}
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection
