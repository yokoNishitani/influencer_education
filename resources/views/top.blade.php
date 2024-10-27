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
                        <img src="{{ asset('storage/' . $banner->image) }}" class="d-block w-100" alt="Banner Image">
                    </div>
                @endforeach
            </div>

            <div class="slides">
                <img src="image1.jpg" alt="Image 1">
                <img src="image2.jpg" alt="Image 2">
                <img src="image3.jpg" alt="Image 3">
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

            banners.forEach((banner, index) => {
        const dot = document.createElement("div");
        dot.classList.add("dot");
        if (index === currentBanner) dot.classList.add("active");
        dotsContainer.appendChild(dot);

        // ドットをクリックすると該当するスライドに移動
        dot.addEventListener("click", () => {
            showSlide(index);
        });
    });

    // ドットとスライドを更新する関数
    function showSlide(index) {
        banners[currentBanner].classList.remove("active");
        dotsContainer.children[currentBanner].classList.remove("active");

        currentBanner = index;
        banners[currentBanner].classList.add("active");
        dotsContainer.children[currentBanner].classList.add("active");
    }

    // 「次へ」ボタン
    nextBtn.addEventListener("click", function() {
        banners[currentBanner].classList.remove("active");
        dotsContainer.children[currentBanner].classList.remove("active");
        currentBanner = (currentBanner + 1) % banners.length;
        banners[currentBanner].classList.add("active");
        dotsContainer.children[currentBanner].classList.add("active");
    });

    // 「前へ」ボタン
    prevBtn.addEventListener("click", function() {
        banners[currentBanner].classList.remove("active");
        dotsContainer.children[currentBanner].classList.remove("active");
        currentBanner = (currentBanner - 1 + banners.length) % banners.length;
        banners[currentBanner].classList.add("active");
        dotsContainer.children[currentBanner].classList.add("active");
    });

    // 初期表示
    showSlide(currentBanner);
});
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const banners = document.querySelectorAll(".swiper-slide img");
            const prevBtn = document.querySelector(".prev-btn");
            const nextBtn = document.querySelector(".next-btn");
            let currentBanner = 0;

        banners[currentBanner].classList.add("active");

    // 次へボタンの動作
        nextBtn.addEventListener("click", function() {
        banners[currentBanner].classList.remove("active");
        currentBanner = (currentBanner + 1) % banners.length;
        banners[currentBanner].classList.add("active");
    });
    
    prevBtn.addEventListener("click", function() {
        banners[currentBanner].classList.remove("active");
        currentBanner = (currentBanner - 1 + banners.length) % banners.length;
        banners[currentBanner].classList.add("active");
    });
});
    </script>
@endpush
