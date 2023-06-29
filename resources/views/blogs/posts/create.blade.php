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
            <textarea class="form-control" id="content" rows="3" placeholder="content" name="content" required>{{ old('content') }}</textarea>
        </div>

        <div class="input-group mb-3" style="margin-top: 10px;">
            <button class="btn btn-light" type="button" id="add_file">파일첨부</button>
            <input type="text" class="form-control" id="img_text" name="img_text" value="{{ old('img_link') }}" placeholder="선택된 파일이 없습니다." readonly>
        </div>

        <input class="form-control" type="file" id="img" name="img" value="{{ old('img_link') }}" style="display: none" multiple>

        <p class="bs-component">
            <button style="margin-top:20px" type="submit" class="btn btn-primary">Submit</button>
        </p>
    </form>

    <script>
        $(function() {
            $("#img").change(function (){
                var file = this.files[0];

                console.log(file.name);
                $("#img_text").val(file.name);
            })

            $("#add_file").click(function() {
                $("#img").click();
            })
        })
    </script>
@endsection
