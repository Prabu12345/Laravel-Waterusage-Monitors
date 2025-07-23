<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'MyWaterTrack') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <!-- Custom Styles -->

    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/regiter.css') }}">
    <link rel="stylesheet" href="{{ asset('css/about.css') }}">
    <link rel="stylesheet" href="{{ asset('css/biodata.css') }}">

    <!-- Page-specific CSS -->
    @yield('css')

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">


</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand d-flex align-items-center" href="{{ url('/') }}">
                    <div
                        style="background: #f8f9fa; border-radius: 12px; padding: 4px 10px; display: flex; align-items: center; margin-right: 12px;">
                        <img src="{{ asset('image/logo.png') }}" alt="Logo" class="navbar-logo" style="height:32px;">
                    </div>
                    <span style="font-family: 'Orbitron', 'Nunito', sans-serif; font-weight: 700; letter-spacing: 2px;">
                        {{ config('app.name', 'MyWaterTrack') }}
                    </span>
                    <!-- Orbitron font for cooler look -->
                    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@700&display=swap"
                        rel="stylesheet">
                </a>


                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">
                        @guest
                            <li class="nav-item">
                                <a class="nav-link me-2" href="{{ route('homepage.home') }}">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link me-2" href="{{ route('homepage.about') }}">Tentang Kami</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link me-2" href="{{ route('homepage.contact') }}">Kontak</a>
                            </li>
                        @else
                            <li class="nav-item">
                                <a class="nav-link me-2" href="{{ route('dashboard.index') }}">Dashboard</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link me-2" href="{{ route('waterusage.index') }}">Kelola Data</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link me-2" href="{{ route('dashboard.tips') }}">Tips Penggunaan Air</a>
                            </li>
                        @endguest

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                                            document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            <div class="container">
                @yield('content')
            </div>
        </main>
        @yield('scripts')

    </div>
</body>

</html>