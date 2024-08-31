@extends('layouts.app')

@section('content')
<div class="container">
    <header class="fixed-top bg-white shadow-sm">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light bg-white">
                <a class="navbar-brand" href="#">アプリ名</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="#">時間割</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">授業進捗</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">プロフィール設定</a>
                        </li>
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">ログイン</a>
                            </li>
                        @else
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('logout') }}" 
                                   onclick="event.preventDefault();
                                   document.getElementById('logout-form').submit();">ログアウト</a>
                                   <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>

                            </li>
                        @endguest
                    </ul>
                </div>
            </nav>
        </div>
    </header>

    <div class="pt-5 mt-4">
        <!-- バナー表示エリア -->
        <div id="bannerCarousel" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                @foreach($banners as $banner)
                    <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                        <img src="{{ asset('storage/banners/' . $banner->image) }}" class="d-block w-100" alt="Banner Image">
                    </div>
                @endforeach
            </div>
            <a class="carousel-control-prev" href="#bannerCarousel" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#bannerCarousel" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>

        <!-- お知らせ表示エリア -->
        <div class="mt-4">
            <h2>お知らせ</h2>
            <ul>
                @foreach($articles as $article)
                    <li>{{ $article->title }}</li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
@endsection