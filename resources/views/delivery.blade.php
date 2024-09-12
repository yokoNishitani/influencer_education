@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ $curriculum->title }}</h1>
    <p>{{ $curriculum->description }}</p>
    <img src="{{ $curriculum->thumbnail }}" alt="{{ $curriculum->title }}" width="200">
    <p>ビデオURL: <a href="{{ $curriculum->video_url }}">{{ $curriculum->video_url }}</a></p>
    <p>常時配信フラグ: {{ $curriculum->alway_delivery_flg ? 'Yes' : 'No' }}</p>
    <p>学年ID: {{ $curriculum->grade_id }}</p>

    <h2>進捗</h2>
    @foreach($curriculumProgress as $progress)
        <p>{{ $progress->progress_status }}</p>
    @endforeach

    <h2>クラス</h2>
    @foreach($classes as $class)
        <p>{{ $class->class_name }}</p>
    @endforeach
</div>
@endsection