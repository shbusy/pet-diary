<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script  src="http://code.jquery.com/jquery-latest.min.js"></script>
        <title>@yield('title')</title>
    </head>
    <body>
        <main>@yield('content')</main>
    </body>
</html>
