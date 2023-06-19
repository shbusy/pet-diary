@extends('layouts.app')

@section('title', '블로그 관리')

@section('content')
    <div>
        <form action="{{ route('blogs.update', $blog) }}" method="POST">
            @method('PUT')
            @csrf

            <p>블로그명 : <input type="text" name="name" value="{{ $blog->name }}"></p>
            <p>표시되는 이름 : <input type="text" name="display_name" value="{{ $blog->display_name }}"></p>

            <p><button type="submit">이름 바꾸기</button></p>
        </form>

        <form action="{{ route('blogs.destroy', $blog) }}" method="POST">
            @method('DELETE')
            @csrf

            <button type="submit">삭제</button>
        </form>
    </div>
@endsection
