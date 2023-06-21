<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script  src="http://code.jquery.com/jquery-latest.min.js"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootswatch@5.3.0/dist/minty/bootstrap.min.css">
        <title>@yield('title')</title>
    </head>

    <body>
        <div class="navbar navbar-expand-lg bg-light" data-bs-theme="light">
            <div class="container-fluid">
                <a class="navbar-brand" href="/">Pet-Diary</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor03" aria-controls="navbarColor03" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarColor03">
                        <ul class="navbar-nav me-auto">
                    @auth
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('blogs.index') }}">my-feed</a>
                            </li>
                    @endauth
                        </ul>

                    @auth
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" style="margin-right: 5px" class="btn btn-outline-primary">logout</button>
                        </form>
                    @endauth

                    @guest
                        <button type="button" style="margin-right: 5px" class="btn btn-primary" onclick="location.href='{{ route('login') }}'">login</button>
                        <button type="button" style="margin-right: 5px" class="btn btn-primary" onclick="location.href='{{ route('register') }}'">join</button>
                    @endguest
                    </p>
{{--                    <form class="d-flex">
                        <input class="form-control me-sm-2" type="search" placeholder="Search">
                        <button class="btn btn btn-primary my-2 my-sm-0" type="submit">Search</button>
                    </form>--}}
                </div>
            </div>
        </div>
        <div style="padding-top:120px" class="container">
            <div class="page-header">
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
