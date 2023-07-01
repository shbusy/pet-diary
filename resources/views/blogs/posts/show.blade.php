@extends('layouts.app')

@section('header', $post->blog->name)

@section('content')
        <div class="col-lg-4">
            <p class="bs-component">
                <button type="button" onclick="location.href='{{ route('blogs.show', $post->blog) }}'" class="btn btn-outline-primary btn-sm" style="width: 100%;">Go Feed</button>{{--목록버튼--}}
            </p>

            @if($post->img_link){{--글 이미지--}}
                <article><img src="{{ '/images/'. $post->img_link }}" alt="image" style="width: 100%; border-radius: 5%; margin-bottom: 10px;"></article>
            @endif

            @include('layouts.content'){{--본문--}}

            <p class="bs-component">{{--수정,삭제버튼--}}
                @can(['update', 'delete'], $post){{--수정버튼--}}
                    <button type="button" onclick="location.href='{{ route('posts.edit', $post) }}'" class="btn btn-light btn-sm" style="width: 49%;">✏</button>
                @endcan

                @can(['update', 'delete'], $post){{--삭제버튼--}}
                    <button type="submit" class="btn btn-light btn-sm" onclick="if(confirm('글을 삭제하시겠습니까?')) { $('#delete_form').submit(); }" style="width: 49%;">✖</button>
                    <form action="{{ route('posts.destroy', $post) }}" method="POST" id="delete_form">
                        @csrf
                        @method('DELETE')
                    </form>
                @endcan

        </div>

        <div class="col-lg-4">{{--댓글--}}
            <div class="list-group">
                <ul class="list-group">
                    @if($post->comments_count > 0)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <small>Comment</small>
                            <span class="badge bg-primary rounded-pill">{{ $post->comments_count }}</span>{{--댓글갯수--}}
                        </li>
                        @foreach($comments as $comment)
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <small>
                                    <strong>{{ $comment->user->name }}</strong> <small class="text-muted">{{ $comment->created_at_format }}</small>
                                    <br>{{ $comment->content }}
                                </small>
                            </li>
                        @endforeach
                    @else
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <small>No comments</small>
                        </li>
                    @endif
                </ul>
            </div>

            <form action="{{ route('posts.comments.store', $post) }}" id="comment_form" method="POST">
                <div class="input-group mb-3">
                    @csrf

                    <input type="text" class="form-control" id="content" name="content" style="border-radius: 0.4rem; border-top-right-radius: 0px; border-bottom-right-radius: 0px;" value="{{ old('content') }}">
                    <button class="btn btn-primary" type="button" id="add_comment">Add</button>
                </div>
            </form>
        </div>

        <script>
            $(function () {
                // 엔터키 submit방지
                $('input[type="text"]').keydown(function() {
                    if (event.keyCode === 13) {
                        event.preventDefault();
                    }
                });

                $("#add_comment").click(function (){
                    $.post("{{ route('posts.comments.store', $post) }}", $("#comment_form").serialize(), function(data) {
                        if(data.result === "s") {
                            location.reload();
                        } else {
                            alert(data.result);
                        }
                    })
                })
            })
        </script>
@endsection
