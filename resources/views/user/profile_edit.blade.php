@extends('user.layouts.app')

@section('title', 'プロフィール変更')

@push('css/user/user_profile')
<link href="{{ asset('css/user/user_profile.css') }}" rel="stylesheet">
@endpush

@section('content')
<div class="back">
    <a href="{{ route('user.show.top') }}">戻る</a>
</div>
<h1>プロフィール変更</h1>
<form action="{{ route('user.show.profile') }}" class="form__profile-edit" method="POST" enctype="multipart/form-data">
    @csrf
    <div>
        <img src="{{ asset($user->profile_image) }}" alt="profile_image" width="100" height="auto">
        <label class="label">プロフィール画像</label>
        <input type="file" name="profile_image" id="profile_image">
    </div>

    <div>
        <label>ユーザーネーム</label>
        <input type="text" name="name" id="name" value="{{ $user->name }}">
    </div>
    @if($errors->has('name')) <p class="validation-comment">{{ $errors->first('name') }}</p>
    @endif

    <div>
        <label>カナ</label>
        <input type="text" name="name_kana" id="name_kana" value="{{ $user->name_kana }}">
    </div>
    @if($errors->has('name_kana')) <p class="validation-comment">{{ $errors->first('name_kana') }}</p>
    @endif

    <div>
        <label>メールアドレス</label>
        <input type="text" name="email" id="email" value="{{ $user->email }}">
    </div>
    @if($errors->has('email')) <p class="validation-comment">{{ $errors->first('email') }}</p>
    @endif

    <div>
        <label>パスワード</label>
        <button type="button">
            <a href="{{ route('user.show.password.edit') }}">パスワードを変更する</a>
        </button>
    </div>

    <button type="submit" class="btn__user-profile-update">登録</button>
</form>

@endsection