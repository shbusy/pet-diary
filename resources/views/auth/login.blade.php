@extends('layouts.app')

@section('title', '로그인')

@section('content')
    <form action="{{ route('login') }}" name="login_form" id="login_form" method="POST">
        @csrf
        <p>이메일 : <input type="text" name="email" value="{{ old('email') }}"></p>
        <p>비밀번호 : <input type="password" name="password"></p>
        {{--<p><input type="checkbox" name="remember">자동로그인</p>--}}

        <p><button type="button" id="login_button">로그인</button></p>
    </form>
    <script>
        $(function (){
            $("#login_button").click(function() {
                var result;
                $.ajax({
                    url: "{{ route('login') }}",
                    data: $("#login_form").serialize(),
                    dataType: "text",
                    type: "POST",
                    success: function(data) {
                        result = data;
                    },
                    error: function(e) {
                        console.log(e);
                    }
                });
            });
        })
    </script>
@endsection

