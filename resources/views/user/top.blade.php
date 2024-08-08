@extends('user.layouts.app')

@section('title', 'TOP')

@push('css/user/user_article')
<link href="{{ asset('css/user/user_article.css') }}" rel="stylesheet">
@endpush

@section('content')
<h1>ユーザー画面TOP</h1>
@endsection
