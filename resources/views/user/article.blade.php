@extends('user.layouts.app')

@section('title', 'お知らせ詳細')

@push('css/user/user_article')
<link href="{{ asset('css/user/user_article.css') }}" rel="stylesheet">
@endpush

@section('content')
<div class="back">
    <a href="{{ route('user.show.top') }}">戻る</a>
</div>
<div class="wrapper__user-article">
    <p>{{ $article->posted_date }}</p>
    <h1>{{ $article->title }}</h1>
    <p>{{ $article->article_contents }}</p>
</div>

@endsection
