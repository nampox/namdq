<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>nampox</title>

    <!-- Boostrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
            crossorigin="anonymous"></script>

    <!-- boxicons -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <!-- jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet"/>

    <!-- Swiper CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    <link rel="stylesheet" href="/assets/css/home.css">
    <script src="/assets/js/welcome.js"></script>

    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
<header class="header">
    <a href="" class="logo">nampox</a>
    <nav class="navbar">
        <a href="#" class="nav-link active" id="home-link">Trang chủ</a>
        <a href="#" class="nav-link" id="project-link">Dự án</a>
        <a href="#" class="nav-link" id="services-link">Services</a>
        <a href="#" class="nav-link" id="portfolio-link">Portfolio</a>
        <a href="#" class="nav-link" id="contact-link">Contact</a>
        <a href="#" class="nav-link" id="login-link">login</a>
        @if (Route::has('login'))
            @auth
                <a href="{{ route('dashboard') }}" class="nav-link" id="dashboard-link">Dashboard</a>
            @else
                <a href="{{ route('login') }}" class="nav-link" id="login-link">Log in</a>
                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="nav-link" id="register-link">Register</a>
                @endif
            @endauth
        @endif
    </nav>
</header>
@include('frontend.user.home')
@include('frontend.user.project')
@include('frontend.user.services')
@include('frontend.user.portfolio')
@include('frontend.user.contact')
@include('frontend.user.login')
</body>
</html>
