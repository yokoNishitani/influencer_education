@extends('layouts.app')

@section('content')
<div class="container">
    <!-- 授業のタイトル -->
    <h1>{{ $curriculum->title }}</h1>

    <!-- 授業の説明/内容 -->
    <p>{{ $curriculum->description }}</p>

    <!-- 授業のビデオ（iframeで埋め込み） -->
    <div class="video-container mb-3">
        @if ($canViewContent)
        <iframe src="{{ $curriculum->video_url }}" width="560" height="315" frameborder="0" allowfullscreen></iframe>
        @else
            <p>この動画は現在公開されていません。</p>
        @endif

        <!-- ボタンをここに配置 -->
        <div class="button-container">
            @if ($isCompleted)
                <p>この授業は既に受講済みです。</p>
            @else
                <!-- 授業が配信期間内かチェック -->
                 @if ($canViewContent)
                    <!-- 「受講しました」ボタン -->
                    <form action="{{ route('mark.completed', $curriculum->id) }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-success">受講しました</button>
                    </form>
                @else
                    <p>この授業は配信期間外です。</p>
                    <button class="btn btn-secondary" disabled>受講ボタンは無効です</button>
                @endif
            @endif
        </div>
    </div>

    <!-- 授業の学年情報 -->
    <p>授業の学年: {{ $grade ? $grade->name : '未設定' }}</p>
</div>
@endsection

