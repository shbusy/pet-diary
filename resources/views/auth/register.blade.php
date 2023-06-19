@extends('layouts.app')

@section('title', '회원가입')

@section('content')
    <form action="{{ route('register') }}" method="POST">
        @csrf
        <p>이름 : <input type="text" name="name" value="{{ old('name') }}" required></p>
        <p>이메일 : <input type="text" name="email" value="{{ old('email') }}" required></p>
        <p>비밀번호 : <input type="password" name="password" required></p>

        <button type="submit">회원가입</button>
    </form>
@endsection
