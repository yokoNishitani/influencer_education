<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{ asset('css/user.app.css') }}" rel="stylesheet">
    <title>@yield('title')</title>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.tablesorter/2.31.0/js/jquery.tablesorter.min.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
    <div id="app">
        <header>
                @auth
                    <div class="userHeader">
                        <button class="headerBtn"><a href="{{ route('user.show.curriculum') }}">時間割</a></button>
                        <button class="headerBtn"><a href="{{ route('user.show.progress') }}">授業進捗</a></button>
                        <button class="headerBtn"><a href="{{ route('user.show.profile') }}">プロフィール設定</a></button>
                        <a class="logout" href="{{ route('user.logout') }}"
                        onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                        ログアウト
                        </a>
                        <form id="logout-form" action="{{ route('user.logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                @endauth   
        </header>
        <main>
            @yield('content')
        </main>
    </div>
    <script src="{{ asset('js/user.app.js') }}"></script>
</body>
</html>
