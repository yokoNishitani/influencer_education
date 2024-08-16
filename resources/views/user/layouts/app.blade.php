<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="{{ asset('css/reset.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    @stack('css/user/user_article')
    @stack('css/user/user_profile')
    <title>@yield('title')</title>
</head>

<body>
    <header>
        <div class="admin-header">
            <p>共通ヘッダー(仮)
            </p>
        </div>
        <style>
            .admin-header {
                background-color: #f26b4a;
                width: 100%;
                height: 100px;
            }
        </style>
    </header>
    <main>
        @yield('content')
    </main>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="{{ asset('js/admin/script.js') }}"></script>
</body>

</html>
