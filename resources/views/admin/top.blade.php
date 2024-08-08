@extends('admin.layouts.app')

@section('title', 'TOP')

@push('css/admin/admin_article')
<link href="{{ asset('css/admin/admin_article.css') }}" rel="stylesheet">
@endpush

@section('content')
<h1>管理画面TOP</h1>
@endsection
