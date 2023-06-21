@extends('layouts.app')

@section('title', '글쓰기')

@section('header', 'Posts')

@section('content')
    <form action="{{ route('blogs.posts.store', $blog) }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label class="col-form-label mt-4" for="title">title</label>
            <input type="text" class="form-control" placeholder="title" id="title" name="title" value="{{ old('title') }}" required autofocus>
        </div>

        <div class="form-group">
            <label for="content" class="form-label mt-4">content</label>
            <textarea class="form-control" id="content" rows="3" name="content" required>{{ old('content') }}</textarea>
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
