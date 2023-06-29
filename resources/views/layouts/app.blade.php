<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
        <script  src="http://code.jquery.com/jquery-latest.min.js"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootswatch@5.3.0/dist/minty/bootstrap.min.css">
        <title>Pet-Diary</title>
    </head>

    <body>
        <div class="navbar navbar-expand-lg bg-light" data-bs-theme="light">
            <div class="container-fluid">
                <a class="navbar-brand" href="/">Pet-Diary</a>
                <button class="navbar-toggler" type="button" onclick="$('#navbarColor03').toggle();" data-bs-toggle="collapse" data-bs-target="#navbarColor03" aria-controls="navbarColor03" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarColor03">
                        <ul class="navbar-nav me-auto">
                    @auth
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('blogs.index') }}">MyFeed</a>
                        </li>
                    @endauth
                        </ul>

                    @auth
                        <form action="{{ route('logout') }}" method="POST" id="logout_form">
                            @csrf
                        </form>
                    @endauth

                    <form class="d-flex">
                        <ul class="navbar-nav me-auto">
                        @auth
                            <li class="nav-item">
                                <a class="nav-link" href="javascript:void(0);" onclick="$('#logout_form').submit();">logout</a>
                            </li>
                        @endauth
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="javascript:void(0);" onclick="location.href='{{ route('login') }}'">login</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="javascript:void(0);" onclick="location.href='{{ route('register') }}'">join</a>
                            </li>
                        @endguest
                        </ul>
                    </form>
                </div>
            </div>
        </div>
        <div style="padding-top:50px" class="container">
            <div class="page-header" style="margin-bottom: 20px;">
                <h1>@yield('header')</h1>
            </div>
            <div class="bs-docs-section">
                <div class="row">
                    @yield('content')
                </div>
            </div>
        </div>
    </body>
</html>
