@extends('admin.layouts.app')

@section('title', 'トップページ')

@section('content')
    <div class="container">
        <div class="top">
            <p>ユーザーネーム：{{ Auth::guard('admin')->user()->name }}</p>
            <p>メールアドレス：{{ Auth::guard('admin')->user()->email }}</p>
        </div>
    </div>
@endsection