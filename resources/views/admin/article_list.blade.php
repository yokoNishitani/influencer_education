@extends('admin.layouts.app')

@section('title', 'お知らせ一覧')

@push('css/admin/admin_article')
<link href="{{ asset('css/admin/admin_article.css') }}" rel="stylesheet">
@endpush

@section('content')
<div class="back">
    <a href="{{ route('admin.show.top') }}">戻る</a>
</div>
<h1>お知らせ一覧</h1>

<button class="article-list__btn--add"><a href="{{ route('admin.show.article.create') }}">新規作成</a></button>

<table class="article-list__table">
    <thead>
        <tr>
            <th>投稿日時</th>
            <th>タイトル</th>
            <th colspan="2"></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($articles as $article)
        <tr>
            <td>{{ $article->posted_date }}</td>
            <td>{{ $article->title }}</td>
            <td>
                <button class="articles-list__btn--edit" type="button">
                    <a href="{{ route('admin.show.article.edit', $article->id) }}">変更する</a>
                </button>
            </td>
            <td>
                <form action="{{ route('admin.show.article.remove', $article->id) }}" method="POST" class="remove-form">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="articles-list__btn--remove">
                        削除
                    </button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
