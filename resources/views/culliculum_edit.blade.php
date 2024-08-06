@extends('app')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="text-right">
                <a class="btn btn-success" href="{{ route('curriculums.index') }}">戻る</a>
            </div>
            <div class="text-left">
                <h1>授業編集ページ culliculum_edit.blade.php</h1>
            </div>
        </div>
    </div>

    <div style="width: 70%; margin: 0 auto;"> <!-- フォーム全体の幅を70%に設定 -->
        <form action="{{ route('curriculums.update', $curriculum->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <!-- サムネイル -->
            <div class="mb-3" style="display: flex; align-items: center; gap: 20px;">
                @if($curriculum->thumbnail)
                    <div style="flex-shrink: 0;">
                        <img src="{{ asset('storage/images/'.$curriculum->thumbnail)}}" style="width: 100%; height: auto; display: block;">
                    </div>
                @endif
                <div>
                    <dl style="margin-bottom: 1rem;">
                        <dt style="width: 100%;"><label for="thumbnail" class="font-semibold leading-none mt-4" style="margin-top: -1.5rem!important;">サムネイル</label></dt>
                        <dd style="width: 100%;"><input id="thumbnail" type="file" name="thumbnail"></dd>
                    </dl>
                </div>
            </div>

            <!-- 学年 -->
            <div class="mb-3">
                <dl style="display: flex; flex-wrap: wrap; margin-top: 60px; margin-bottom: 1rem;">
                    <dt style="width: 30%;"><label for="title" class="form-label">学年</label></dt>
                    <dd style="width: 70%;"><input type="text" name="title" value="{{ $curriculum->title }}" class="form-control" placeholder="学年"></dd>
                    @error('title')
                        <span style="color: red; float: left;">学年を20文字以内で入力してください</span>
                    @enderror
                </dl>
            </div>

            <!-- 授業名 -->
            <div class="mb-3">
                <dl style="display: flex; flex-wrap: wrap; margin-top: 60px; margin-bottom: 1rem;">
                    <dt style="width: 30%;"><label for="title" class="form-label">授業名</label></dt>
                    <dd style="width: 70%;"><input type="text" name="title" value="{{ $curriculum->title }}" class="form-control" placeholder="授業名"></dd>
                    @error('title')
                        <span style="color: red; float: left;">授業名を20文字以内で入力してください</span>
                    @enderror
                </dl>
            </div>

            <!-- 動画URL -->
            <div class="mb-3">
                <dl style="display: flex; flex-wrap: wrap; margin-top: 60px; margin-bottom: 1rem;">
                    <dt style="width: 30%;"><label for="video_url" class="form-label">動画URL</label></dt>
                    <dd style="width: 70%;"><input type="text" name="video_url" value="{{ $curriculum->video_url }}" class="form-control" placeholder="動画URL"></dd>
                    @error('video_url')
                        <span style="color: red; float: left;">動画URLを20文字以内で入力してください</span>
                    @enderror
                </dl>
            </div>

            <!-- 授業概要 -->
            <div class="mb-3">
                <dl style="display: flex; flex-wrap: wrap; margin-bottom: 1rem;">
                    <dt style="width: 30%;"><label for="description" class="form-label">授業概要</label></dt>
                    <dd style="width: 70%;"><textarea class="form-control" style="height: 100px;" name="description" placeholder="授業概要">{{ $curriculum->description }}</textarea></dd>
                    @error('description')
                        <span style="color: red; float: left;">授業概要を100文字以内で入力してください</span>
                    @enderror
                </dl>
            </div>

            <!-- 常時公開ボタン -->
            <div class="pull-right" style="text-align: center;">
                <button type="submit" class="btn btn-primary btn-lg mt-2">常時公開ボタン</button>
            </div>

            <!-- ボタンここから -->
            <div class="pull-right" style="text-align: center;">
                <button type="submit" class="btn btn-secondary btn-lg mt-2">登録</button>
            </div>
        </form>
    </div>
@endsection
