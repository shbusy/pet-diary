@extends('layouts.app')

@section('header', 'Modify')

@section('content')
    <div class="col-lg-6">
        <form action="{{ route('myinfo.update') }}" method="POST">
            @csrf
            <fieldset>
                <div class="form-group">
                    <label for="name" class="form-label mt-4">NickName</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ auth()->user()->name }}" required placeholder="Enter NickName">
                </div>
                <div class="form-group">
                    <label for="password" class="form-label mt-4">Password</label>
                    <input type="password" class="form-control" id="password" name="password" required placeholder="Password">
                </div>
                <div class="form-group">
                    <label for="password" class="form-label mt-4">Password Check</label>
                    <input type="password" class="form-control" id="password" name="password" required placeholder="Password">
                </div>
            </fieldset>
                <p class="bs-component">
                    <button style="margin-top:20px" type="button" class="btn btn-warning">Update</button>
                    <button style="margin-top:20px" type="button" class="btn btn-danger">Leave</button>
                </p>
        </form>
    </div>
@endsection
