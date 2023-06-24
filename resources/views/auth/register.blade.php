@extends('layouts.app')

@section('header', 'Join')

@section('content')
    <div class="col-lg-6">
        <form action="{{ route('register') }}" method="POST">
            @csrf
            <fieldset>
                <div class="form-group">
                    <label for="name" class="form-label mt-4">NickName</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required placeholder="Enter NickName">
                </div>
                <div class="form-group">
                    <label for="email" class="form-label mt-4">Email address</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror " id="email" name="email" value="{{ old('email') }}" required aria-describedby="emailHelp" placeholder="Enter email">
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="password" class="form-label mt-4">Password</label>
                    <input type="password" class="form-control" id="password" name="password" required placeholder="Password">
                </div>
                <p class="bs-component">
                    <button style="margin-top:20px" type="submit" class="btn btn-primary">Submit</button>
                </p>
            </fieldset>
        </form>
    </div>
@endsection
