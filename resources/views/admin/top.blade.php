@extends('admin.layouts.app')

@section('title', 'トップページ')

@section('content')
    <div class="container">
        <div class="top">
            <p>ユーザーネーム：{{ $admins->name }}</p>
            <p>メールアドレス：{{ $admins->email }}</p>
        </div>
    </div>
@endsection