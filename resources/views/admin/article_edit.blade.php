@extends('admin.layouts.app')

@section('title', 'お知らせ変更')

@push('css/admin/admin_article')
<link href="{{ asset('css/admin/admin_article.css') }}" rel="stylesheet">
@endpush

@section('content')
<div class="back">
    <a href="{{ route('admin.show.article.list') }}">戻る</a>
</div>
<h1>お知らせ変更</h1>

<form action="{{ route('admin.show.article.edit', $article->id) }}" class="article__form" method="POST"'>
            @csrf
            <div class="input-form">
                <label>投稿日時</label>
                <input type="date" name="posted_date" value="{{ $article->posted_date }}">
            </div>
            @if($errors->has('posted_date')) <p class="validation-comment">{{ $errors->first('posted_date') }}</p>
    @endif

    <div class="input-form">
        <label>タイトル</label>
        <input type="text" name="title" value="{{ $article->title }}">
    </div>
    @if($errors->has('title'))
    <p class="validation-comment">{{ $errors->first('title') }}</p>
    @endif

    <div class="input-form">
        <label>本文</label>
        <textarea name="article_contents">{{ $article->article_contents }}</textarea>
    </div>
    @if($errors->has('article_contents'))
    <p class="validation-comment">{{ $errors->first('article_contents') }}</p>
    @endif

    <button type="submit">更新</button>
</form>
@endsection
