@extends('layouts.app')

@section('header', $post->blog->name)

@section('content')
    <div style="width: 100%; text-align: -webkit-center;">
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
            <div class="list-group" style="margin-bottom: 10px;">
                    <a href="javascript:void(0);" class="list-group-item list-group-item-action flex-column align-items-start">
                        <div class="d-flex w-100 justify-content-between">
                            <h5 class="mb-1">{{ $post->title }}</h5>
                            <small class="text-muted">{{ $post->created_at_format }}</small>
                        </div>
                        <div class="d-flex w-100 justify-content-between">
                            <p class="mb-1">{{ $post->content }}</p>
                        </div>
                    </a>
            </div>
            <div class="list-group">{{--댓글 리스트--}}
                <ul class="list-group">
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        Comment
                        <span class="badge bg-primary rounded-pill">14</span>{{--댓글갯수--}}
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        댓글작성을 오픈 준비중이예요!
                    </li>
                </ul>
            </div>
        </div>
    </div>
@endsection
