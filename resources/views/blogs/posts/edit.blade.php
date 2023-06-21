@extends('layouts.app')

@section('title', '글수정')

@section('header', 'Edit Posts')

@section('content')
    <form action="{{ route('posts.update', $post) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label class="col-form-label mt-4" for="title">title</label>
            <input type="text" class="form-control" placeholder="title" id="title" name="title" value="{{ old('title', $post->title) }}" required autofocus>
        </div>

        <div class="form-group">
            <label for="content" class="form-label mt-4">content</label>
            <textarea class="form-control" id="content" rows="3" name="content" required>{{ old('title', $post->content) }}</textarea>
        </div>

        <div class="form-group">
            <label for="img" class="form-label mt-4"></label>
            <input class="form-control" type="file" id="img" name="img" multiple>
        </div>

        <p class="bs-component">
            <button style="margin-top:20px" type="submit" class="btn btn-primary">Submit</button>
        </p>
    </form>
@endsection

