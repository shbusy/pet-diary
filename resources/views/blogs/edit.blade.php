@extends('layouts.app')

@section('header', 'Setting blog')

@section('content')
    <div class="col-lg-6">
        <form action="{{ route('blogs.update', $blog) }}" method="POST" id="edit_form">
            @method('PUT')
            @csrf

            <fieldset>
                <div class="form-group">
                    <label for="name" class="form-label mt-4">Feed Name</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ $blog->name }}" required>
                    @error('name')
                    {{ $message }}
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror

                </div>
                <div class="form-group">
                    <label for="display_name" class="form-label mt-4">Display Name</label>
                    <input type="text" class="form-control" id="display_name" name="display_name" value="{{ $blog->display_name }}" required>
                </div>
                <div class="form-group">
                    <label for="description" class="form-label mt-4">Description</label>
                    <textarea class="form-control" id="description" name="description" required>{{ $blog->description }}</textarea>
                </div>
            </fieldset>
        </form>

        <form action="{{ route('blogs.destroy', $blog) }}" method="POST" id="delete_form">
            @method('DELETE')
            @csrf
        </form>

        <p class="bs-component">
            <button style="margin-top:20px" type="button" id="edit_button" class="btn btn-primary" onclick="$('#edit_form').submit();">Submit</button>
            <button style="margin-top:20px" type="button" id="delete_button" class="btn btn-danger" onclick="if(confirm('피드를 삭제하시겠습니까?')) { $('#delete_form').submit(); }">Delete Blog</button>
        </p>
    </div>
@endsection
