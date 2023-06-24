@extends('layouts.app')

@section('title', '글수정')

@section('header', 'Edit Posts')

@section('content')
    <div class="col-lg-12">
        <form action="{{ route('posts.update', $post) }}" method="POST" id="edit_form" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label class="col-form-label mt-4" for="title">title</label>
                <input type="text" class="form-control" placeholder="title" id="title" name="title" value="{{ old('title', $post->title) }}" required autofocus>
            </div>

            <div class="form-group">
                <label for="content" class="form-label mt-4">content</label>
                <textarea class="form-control" id="content" rows="3" name="content" required>{{ old('content', $post->content) }}</textarea>
            </div>

            <div class="form-group" style="margin-top: 10px;">
                <button type="button" class="btn btn-light" id="add_file" style="float: left; margin-right: 10px;">파일첨부</button>
                <input class="form-control" type="text" id="img_text" style="width: 91%; float: left;" name="img_text" value="{{ old('title', $post->img_link) }}" multiple>
            </div>
                <input class="form-control" type="file" id="img" name="img" value="{{ old('title', $post->img_link) }}" style="display: none" multiple>
        </form>

        <p class="bs-component">
            <button style="margin-top:20px" type="submit" onclick="if(confirm('수정하시겠습니까?')) { $('#edit_form').submit(); }" class="btn btn-primary">Submit</button>
        </p>
    </div>
    <script>
        $(function() {
            var img_link = "{{ $post->img_link }}";

            if(!img_link) {
                $("#img_text").val("선택된 파일 없음");
            }

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

