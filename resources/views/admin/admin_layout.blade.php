<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    {{-- bootstrap --}}
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Fredoka+One&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Fredoka+One&family=Poppins&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Fredoka+One&family=Poppins:wght@300&display=swap" rel="stylesheet">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/admin_style.css') }}" rel="stylesheet">

</head>
<body>
<div class="side-bar">
    <div class="side-bar-title-wrap">
        <h2>MYAUTO - ADMIN</h2>
    </div>
    <div class="s-b-models-title-wrap">
        <h3>MODELS</h3>
    </div>
    <div class="s-b-nav">
        <a href="{{ route('admin.users') }}">Users</a>
        <a href="{{ route('admin.posts') }}">Posts</a>
        <a href="{{ route('admin.categories') }}" class="admin-categories">Categories</a>
        <a href="{{ route('admin.manufacturers') }}" class="admin-categories">Manufacturers</a>
        <a href="{{ route('admin.brands') }}" class="admin-categories">Brands</a>
    </div>
</div>
@include('partials.alerts')
@yield('content')
</body>
</html>

