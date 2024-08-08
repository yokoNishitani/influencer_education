@extends('user.layouts.app')

@section('title', 'プロフィール変更')

@push('css/user/user_article')
<link href="{{ asset('css/user/user_article.css') }}" rel="stylesheet">
@endpush

@section('content')
<div class="back">
    <a href="{{ route('user.show.top') }}">戻る</a>
</div>
<h1>プロフィール変更</h1>
<form action="">
    
</form>

@endsection
