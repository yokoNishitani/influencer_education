<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">

    <!-- Scripts -->
    @viteReactRefresh
    @vite(['resources/js/app.js', 'resources/css/app.css'])
    @stack('scripts')
    
</head>
<body>
    <div id="app">
        @if (!Route::is('user.login') && !Route::is('user.register'))
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">
                        <class="nav-item">
                                <a class="nav-link" href="{{ route('show.curriculum') }}">時間割</a>
                        <class="nav-item">
                            <a class="nav-link" href="#">授業進捗</a>
                        <class="nav-item">
                            <a class="nav-link" href="#">プロフィール設定</a>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <class="nav-item">
                                    <a class="nav-link" href="{{ route('user.login') }}">ログイン</a>
                            @endif

                            @if (Route::has('register'))
                                <class="nav-item">
                                    <a class="nav-link" href="{{ route('user.register') }}">新規登録はこちら</a>
                            @endif
                        @else

                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">ログアウト
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
        <hr>

        @endif

        <main class="py-4">
            @yield('content')
        </main>

        <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
        <script>
    var swiper = new Swiper('.swiper-container', {
        loop: false, 
        pagination: {
            el: '.swiper-pagination',
            clickable: true, // ドットアイコンをクリック可能にする
        },
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        autoplay: false,
    });
        </script>
    </div>
</body>
</html>