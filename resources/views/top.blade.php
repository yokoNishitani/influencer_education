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
            <button class="prev-btn">＜前へ</button>
            <div class="swiper-wrapper">
                @foreach($banners as $banner)
                    <div class="swiper-slide">
                        <img src="{{ asset('storage/banners/' . $banner->image) }}" class="d-block w-100" alt="Banner Image">
                    </div>
                @endforeach
            </div>

            <button class="next-btn">次へ＞</button>

            <!-- ドットアイコンのエリア -->
            <div class="dots"></div>
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
@endsection

@push('scripts')
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const banners = document.querySelectorAll(".swiper-slide img");
        const dotsContainer = document.querySelector(".dots");
        const prevBtn = document.querySelector(".prev-btn");
        const nextBtn = document.querySelector(".next-btn");
        let currentBanner = 0;

        // ドットアイコンを生成
        banners.forEach((banner, index) => {
            const dot = document.createElement("div");
            dot.classList.add("dot");
            if (index === currentBanner) dot.classList.add("active");
            dotsContainer.appendChild(dot);

            // ドットをクリックすると該当するスライドに移動
            dot.addEventListener("click", () => {
                showSlide(index); // クリックしたドットに対応する画像に切り替える
            });
        });

        // スライドとドットを更新する関数
        function showSlide(index) {
            // 現在のバナーとドットを非表示に
            banners[currentBanner].classList.remove("active");
            dotsContainer.children[currentBanner].classList.remove("active");

            // 新しいバナーとドットを表示
            currentBanner = index;
            banners[currentBanner].classList.add("active");
            dotsContainer.children[currentBanner].classList.add("active");
        }

        // 次へボタン
        nextBtn.addEventListener("click", function() {
            showSlide((currentBanner + 1) % banners.length);
        });

        // 前へボタン
        prevBtn.addEventListener("click", function() {
            showSlide((currentBanner - 1 + banners.length) % banners.length);
        });

        // 初期表示
        showSlide(currentBanner);
    });
</script>
@endpush