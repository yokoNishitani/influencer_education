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

    <div style="width: 70%; margin: 0 auto;">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('curriculums.update', $curriculum->id) }}" method="POST" enctype="multipart/form-data">

    @csrf
    @method('PUT')


            <!-- サムネイル -->
            <div class="mb-3" style="display: flex; align-items: center; gap: 20px;">
                @if($curriculum->thumbnail)
                    <div style="flex-shrink: 0;">
                        <img src="{{ asset('storage/images/'.$curriculum->thumbnail) }}" style="width: 100%; height: auto; display: block;">
                    </div>
                @endif
                <div>
                    <dl style="margin-bottom: 1rem;">
                        <dt style="width: 100%;">
                            <label for="thumbnail" class="font-semibold leading-none mt-4" style="margin-top: -1.5rem!important;">サムネイル</label>
                        </dt>
                        <dd style="width: 100%;">
                            <input id="thumbnail" type="file" name="thumbnail">
                        </dd>
                    </dl>
                </div>
            </div>

    <!-- 学年 -->
    <div class="mb-3">
        <dl style="display: flex; flex-wrap: wrap; margin-bottom: 1rem;">
            <dt style="width: 30%;"><label for="grade" class="form-label">学年</label></dt>
            <dd style="width: 70%;">
            <select name="grade_id" id="grade" class="form-select">
    <option value="">学年を選択してください</option>
    @foreach ($grades as $grade)
        <option value="{{ $grade->id }}" @if($grade->id == $curriculum->grade_id) selected @endif>
            {{ $grade->name }}
        </option>
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
                        <label for="course_name" class="form-label">授業名</label>
                    </dt>
                    <dd style="width: 70%;">
                        <input id="course_name" type="text" name="title" value="{{ $curriculum->title }}" class="form-control" placeholder="授業名">
                    </dd>
                </dl>
            </div>

            <!-- 動画URL -->
            <div class="mb-3">
                <dl style="display: flex; flex-wrap: wrap; margin-top: 60px; margin-bottom: 1rem;">
                    <dt style="width: 30%;">
                        <label for="video_url" class="form-label">動画URL</label>
                    </dt>
                    <dd style="width: 70%;">
                        <input id="video_url" type="text" name="video_url" value="{{ $curriculum->video_url }}" class="form-control" placeholder="動画URL">
                    </dd>
                </dl>
            </div>

            <!-- 授業概要 -->
            <div class="mb-3">
                <dl style="display: flex; flex-wrap: wrap; margin-bottom: 1rem;">
                    <dt style="width: 30%;">
                        <label for="description" class="form-label">授業概要</label>
                    </dt>
                    <dd style="width: 70%;">
                        <textarea id="description" class="form-control" style="height: 100px;" name="description" placeholder="授業概要">{{ $curriculum->description }}</textarea>
                    </dd>
                </dl>
            </div>

<!-- 常時公開フラグ -->
<div class="mb-3">
    <dl style="display: flex; flex-wrap: wrap; margin-bottom: 1rem;">
        <dt style="width: 30%;">
            <label for="alway_delivery_flg" class="form-label">常時公開</label>
        </dt>
        <dd style="width: 70%;">
            <input id="alway_delivery_flg" type="checkbox" name="alway_delivery_flg" value="1" 
                @if($curriculum->alway_delivery_flg) checked @endif>
        </dd>
    </dl>
</div>


            <!-- ボタンここから -->
            <div class="pull-right" style="text-align: center;">
                <button type="submit" class="btn btn-secondary btn-lg mt-2">更新</button>
            </div>
        </form>
    </div>
@endsection
