<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="@yield('description')">
    <link rel="icon" href="assets/img/favicon.png" type="image/png">
    <link rel="stylesheet" href="assets/js/fancybox/fancybox.css">
    <link rel="stylesheet" href="assets/css/style.css?ver=123">
    <title>@yield('title')</title>
</head>

    <body>
    @include('components.header')
        @yield('content')
    @include('components.footer')
    </body>
</html>
