@extends('layouts.app')

@section('header', 'New Feed')

@section('content')
    <div class="col-lg-6">
        <form action="{{ route('blogs.store') }}" method="POST">
            @csrf
            <fieldset>
                <div class="form-group">
                    <label for="name" class="form-label mt-4">Feed Name</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" required>
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="display_name" class="form-label mt-4">Display Name</label>
                    <input type="text" class="form-control" id="display_name" name="display_name" value="{{ old('display_name') }}" required>
                </div>
                <div class="form-group">
                    <label for="description" class="form-label mt-4">Description</label>
                    <textarea class="form-control" id="description" name="description">{{ old('display_name') }}</textarea>
                </div>
            </fieldset>
            <p class="bs-component">
                <button style="margin-top:20px" type="submit" id="login_button" class="btn btn-primary">Submit</button>
            </p>
        </form>
    </div>
@endsection
