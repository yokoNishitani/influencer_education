@extends('admin.layouts.app')

@section('title', 'お知らせ登録')

@push('css/admin/admin_article')
<link href="{{ asset('css/admin/admin_article.css') }}" rel="stylesheet">
@endpush

@section('content')
<div class="back">
    <a href="{{ route('admin.show.article.list') }}" class="back">戻る</a>
</div>
<h1>お知らせ登録</h1>

<form action="{{ route('admin.show.article.store') }}" class="article__form" method="POST"'>
            @csrf
            <div class="input-form">
                <label>投稿日時</label>
                <input type="date" name="posted_date" id="posted_date" value="{{ old('posted_date') }}">
            </div>
            @if ($errors->has('posted_date')) <div class="validation-comment">{{ $errors->first('posted_date') }}</div>
    @endif


    <div class="input-form">
        <label>タイトル</label>
        <input type="text" name="title" id="title" value="{{ old('title') }}">
    </div>
    @if ($errors->has('title'))
    <div class="validation-comment">{{ $errors->first('title') }}</div>
    @endif

    <div class="input-form">
        <label>本文</label>
        <textarea name="article_contents" id="article_contents">{{ old('article_contents') }}</textarea>
    </div>
    @if ($errors->has('article_contents'))
    <div class="validation-comment">{{ $errors->first('article_contents') }}</div>
    @endif

    <button type="submit">更新</button>
</form>
@endsection
