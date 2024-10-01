@extends('layouts.app')

@section('content')
<div class="container">
    <header class="fixed-top bg-white shadow-sm">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light bg-white"> 
                </div>
            </nav>
        </div>
    </header>

    <div class="pt-5 mt-4">
        <!-- バナー表示エリア -->
        <div class="swiper-container">
            <div class="swiper-wrapper">
                @foreach($banners as $banner)
                    <div class="swiper-slide">
                        <img src="{{ asset('storage/banners/' . $banner->image) }}" class="d-block w-100" alt="Banner Image">
                    </div>
                @endforeach
            </div>
            <!-- ドットアイコンのエリア -->
            <div class="swiper-pagination"></div>
            <!-- 左右のナビゲーションボタン -->
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>
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