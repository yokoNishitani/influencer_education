@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ $curriculum->title }}</h1>
    <p>{{ $curriculum->description }}</p>
    <img src="{{ $curriculum->thumbnail }}" alt="{{ $curriculum->title }}" width="200">
    <p>ビデオURL: <a href="{{ $curriculum->video_url }}">{{ $curriculum->video_url }}</a></p>
    <p>常時配信フラグ: {{ $curriculum->alway_delivery_flg ? 'Yes' : 'No' }}</p>
    <p>学年ID: {{ $curriculum->grade_id }}</p>

    <h2>カリキュラム進捗</h2>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>進捗</th>
                <th>その他のカラム</th>
            </tr>
        </thead>
        <tbody>
            @foreach($curriculumProgress as $progress)
            <tr>
                <td>{{ $progress->id }}</td>
                <td>{{ $progress->progress }}</td>
                <td>その他の情報</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <h2>グレード情報</h2>
    <p>グレード名: {{ $grade->name }}</p>
</div>
@endsection