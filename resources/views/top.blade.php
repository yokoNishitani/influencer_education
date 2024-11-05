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
            <button class="prev-btn">＜前へ</button>

            <div class="banner-container">
                @foreach ($banners as $index => $banner)
                        <img src="{{ asset($banner->image) }}" class="banner-image" alt="Banner Image {{ $index + 1 }}"
                        style="display: {{ $index === 0 ? 'block' : 'none' }};">
                @endforeach
            </div>

            <button class="next-btn">次へ＞</button>

            <!-- ドットアイコンのエリア -->
        <div class="dots-container">
            @foreach ($banners as $index => $banner)
                <span class="dot @if($index === 0) active @endif" onclick="showImage({{ $index }})"></span>
            @endforeach
        </div>
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
    let currentImage = 0;


    function showImage(index) {
        const images = document.querySelectorAll('.banner-image');
        const dots = document.querySelectorAll('.dot');

        images.forEach((img, i) => {
            img.style.display = (i === index) ? 'block' : 'none';
            dots[i].classList.toggle('active', i === index);
        });


        currentImage = index;
    }

    // 「次へ」ボタンで次の画像を表示
    document.querySelector('.next-btn').addEventListener('click', function() {
        const totalImages = document.querySelectorAll('.banner-image').length; 
        showImage((currentImage + 1) % totalImages);  
    });

    // 「前へ」ボタンで前の画像を表示
    document.querySelector('.prev-btn').addEventListener('click', function() {
        const totalImages = document.querySelectorAll('.banner-image').length; 
        showImage((currentImage - 1 + totalImages) % totalImages);  
    });
    showImage(currentImage);
</script>
@endpush