<!doctype html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{ asset('css/admin.app.css') }}" rel="stylesheet">
    <title>@yield('title')</title>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.tablesorter/2.31.0/js/jquery.tablesorter.min.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
    <header>
        <div id="app">
            @auth
                <div class="adminHeader">
                    <button class="headerBtn"><a href="{{ route('admin.show.curriculum.list') }}">授業管理</a></button>
                    <button class="headerBtn"><a href="{{ route('admin.show.article.list') }}">お知らせ管理</a></button>
                    <button class="headerBtn"><a href="{{ route('admin.show.banner.edit') }}">バナー管理</a></button>
                    <a class ="logout" href="{{ route('admin.logout') }}"
                    onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                    ログアウト
                    </a>
                    <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            @endauth
        </div>
    </header>
    <main>
        @yield('content')
    </main>
    <script src="{{ asset('js/admin.app.js') }}"></script>
</body>
</html>
