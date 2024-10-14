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
            const slides = document.querySelectorAll(".slides img");
            const dotsContainer = document.querySelector(".dots");
            let currentSlide = 0;

            slides.forEach((slide, index) => {
                const dot = document.createElement("div");
                dot.classList.add("dot");
                if (index === currentSlide) dot.classList.add("active");
                dotsContainer.appendChild(dot);

                dot.addEventListener("click", () => {
                    showSlide(index);
                });
            });

            function showSlide(index) {
                slides[currentSlide].classList.remove("active");
                dotsContainer.children[currentSlide].classList.remove("active");

                currentSlide = index;
                slides[currentSlide].classList.add("active");
                dotsContainer.children[currentSlide].classList.add("active");
            }

            showSlide(currentSlide);
        });
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // バナーの画像要素を選択（swiper-slide内のimg要素を取得）
            const banners = document.querySelectorAll(".swiper-slide img");
            const prevBtn = document.querySelector(".prev-btn");
            const nextBtn = document.querySelector(".next-btn");
            let currentBanner = 0;

            banners[currentBanner].classList.add("active");

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
