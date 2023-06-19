@extends('layouts.app')

@section('title', '메인')

@section('content')
    <h1>main</h1>
    <a href="{{ route('register') }}">회원가입</a>
    <a href="">로그인</a>
@endsection
