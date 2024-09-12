@extends('layouts.app')

@section('content')
<div class="container">
    <h1>時間割</h1>
    
    <h2>カリキュラム</h2>
    
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>タイトル</th>
                <th>サムネイル</th>
                <th>説明</th>
                <th>ビデオURL</th>
                <th>常時配信フラグ</th>
                <th>学年ID</th>
            </tr>
        </thead>
        <tbody>
            @foreach($curriculums as $curriculum)
            <tr>
                <td>
                    <a href="{{ route('show.delivery', ['id' => $curriculum->id]) }}">
                        {{ $curriculum->title }}
                    </a>
                </td>
                <td><img src="{{ $curriculum->thumbnail }}" alt="{{ $curriculum->title }}" width="100"></td>
                <td>{{ $curriculum->description }}</td>
                <td>{{ $curriculum->video_url }}</td>
                <td>{{ $curriculum->alway_delivery_flg ? 'Yes' : 'No' }}</td>
                <td>{{ $curriculum->grade_id }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <h2>配信期間設定</h2>
    <table class="table">
        <thead>
            <tr>
                <th>カリキュラムID</th>
                <th>開始時間</th>
                <th>終了時間</th>
            </tr>
        </thead>
        <tbody>
            @foreach($deliveryTimes as $deliveryTime)
            <tr>
                <td>{{ $deliveryTime->curriculum_id }}</td>
                <td>{{ $deliveryTime->delivery_from }}</td>
                <td>{{ $deliveryTime->delivery_to }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection