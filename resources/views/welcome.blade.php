@extends('layouts.app')

@section('title', '메인')

@section('content')
    <h1>main</h1>
    @if($msg == "member")
        {{ Auth::user()->name }}님 안녕하세요
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit">로그아웃</button>
        </form>
    @else
        <a href="{{ route('register') }}">회원가입</a>
        <a href="{{ route('login') }}">로그인</a>
    @endif

@endsection
