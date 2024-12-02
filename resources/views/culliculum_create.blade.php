@extends('app')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="text-right">
                <a class="btn btn-success" href="{{ route('curriculums.index') }}">戻る</a>

            </div>

            <div class="text-left">
                <h2 style="font-size:1rem;">授業新規登録ページculliculum_create.blade.php</h2>
            </div>
        </div>
    </div>

    <form action="{{ route('curriculums.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <!-- サムネイル -->
        <div class="mb-3">
            <dl style="display: flex; flex-wrap: wrap; margin-bottom: 1rem;">
                <dt style="width: 30%;">
                    <label for="thumbnail" class="font-semibold leading-none mt-4" style="margin-top: -1.5rem!important;">サムネイル</label>
                </dt>
                <dd style="width: 70%;">
                    <input id="thumbnail" type="file" name="thumbnail">
                </dd>
            </dl>
        </div>

    <!-- 学年 -->
    <div class="mb-3">
        <dl style="display: flex; flex-wrap: wrap; margin-bottom: 1rem;">
            <dt style="width: 30%;"><label for="grade" class="form-label">学年</label></dt>
            <dd style="width: 70%;">
                <select name="grade_id" id="grade" class="form-select">
                    <option value="">学年を選択してください</option>
                    @foreach ($grades as $grade)
                        <option value="{{ $grade->id }}">{{ $grade->name }}</option>
                    @endforeach
                </select>
            </dd>
            @error('grade_id')
                <span style="color:red;">{{ $message }}</span>
            @enderror
        </dl>
    </div>

        <!-- 授業名 -->
        <div class="mb-3">
            <dl style="display: flex; flex-wrap: wrap; margin-top: 60px; margin-bottom: 1rem;">
                <dt style="width: 30%;">
                    <label for="title" class="form-label">授業名</label>
                </dt>
                <dd style="width: 70%;">
                    <input type="text" name="title" class="form-control" placeholder="授業名">
                </dd>
                @error('title')
                    <span style="color:red; float: left;">授業名を20文字以内で入力してください</span>
                @enderror
            </dl>
        </div>

        <!-- 動画URL -->
        <div class="mb-3">
            <dl style="display: flex; flex-wrap: wrap; margin-top: 60px; margin-bottom: 1rem;">
                <dt style="width: 30%;">
                    <label for="video_url" class="form-label">動画URL</label>
                </dt>
                <dd style="width: 70%;">
                    <input type="text" name="video_url" class="form-control" placeholder="動画URL">
                </dd>
                @error('video_url')
                    <span style="color:red; float: left;">動画URLを255文字以内で入力してください</span>
                @enderror
            </dl>
        </div>

        <!-- 授業概要 -->
        <div class="mb-3">
            <dl style="display: flex; flex-wrap: wrap; margin-bottom: 1rem;">
                <dt style="width: 30%;">
                    <label for="description" class="form-label">授業概要</label>
                </dt>
                <dd style="width: 70%;">
                    <textarea class="form-control" style="height:100px" name="description" placeholder="授業概要"></textarea>
                </dd>
                @error('description')
                    <span style="color:red; float: left;">授業概要を100文字以内で入力してください</span>
                @enderror
            </dl>
        </div>

        <!-- 常時公開フラグ -->
        <div class="mb-3">
            <dl style="display: flex; flex-wrap: wrap; margin-bottom: 1rem;">
                <dt style="width: 30%;">
                    <label for="alway_delivery_flg" class="form-label">常時公開フラグ</label>
                </dt>
                <dd style="width: 70%;">
                    <input type="checkbox" name="alway_delivery_flg" id="alway_delivery_flg" value="1">
                </dd>
            </dl>
        </div>

        <!-- ボタンここから -->
        <div class="pull-right" style="text-align:center;">
            <button type="submit" class="btn btn-primary btn-lg mt-2">登録</button>
        </div>
    </form>
@endsection
