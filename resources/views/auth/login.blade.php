@extends('layouts.app')

@section('header', 'Login')

@section('content')
    <div class="col-lg-6">
        <form action="{{ route('login') }}" name="login_form" id="login_form" method="GET">
            @csrf
            <fieldset>
                <div class="form-group">
                    <label for="email" class="form-label mt-4">Email address</label>
                    <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required aria-describedby="emailHelp" placeholder="Enter email">
                </div>
                <div class="form-group">
                    <label for="password" class="form-label mt-4">Password</label>
                    <input type="password" class="form-control" id="password" name="password" required placeholder="Password">
                </div>
                <div class="form-check form-switch" style="margin-top:20px">
                    <input class="form-check-input" type="checkbox" id="remember" name="remember" checked="">
                    <label class="form-check-label" for="remember">Auto Login</label>
                </div>
                <p class="bs-component">
                    <button style="margin-top:20px" type="button" id="login_button" class="btn btn-primary">Login</button>
                    <button type="button" style="margin-top:20px" class="btn btn-warning" onclick="location.href='{{ route('register') }}'">Join</button>
                </p>
            </fieldset>
        </form>
    </div>
    <script>
        $(function (){
            $("#login_button").click(function() {
                $.ajax({
                    url: "{{ route('login') }}",
                    data: $("#login_form").serialize(),
                    dataType: "json",
                    type: "POST",
                    success: function(data) {
                        if(data.result === "f") {
                            alert("이메일이나 비밀번호가 일치하지 않습니다.");
                        } else if(data.result === "s") {
                            location.href=data.url;
                        }
                    },
                    error: function(e) {
                        console.log(e);
                    }
                });
            });
        })
    </script>
@endsection

