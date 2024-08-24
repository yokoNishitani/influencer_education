@extends('user.layouts.app')

@section('title', '授業配信')

@section('content')

<h1>授業配信(仮)</h1>
<form action="{{ route('user.show.delivery', $curriculum->id) }}" method="POST">
    @csrf
    <button type="submit">受講済にする</button>
</form>

@endsection