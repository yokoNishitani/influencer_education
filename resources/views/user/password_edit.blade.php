@extends('user.layouts.app')

@section('title', 'パスワード変更')

@push('css/user/user_profile')
<link href="{{ asset('css/user/user_profile.css') }}" rel="stylesheet">
@endpush

@section('content')
<div class="back">
    <a href="{{ route('user.show.profile') }}">戻る</a>
</div>
<h1>パスワード変更</h1>
<form action="{{ route('user.show.password.edit') }}" class="form__password-edit" method="POST">
    @csrf
    <div>
        <label for="current_password">旧パスワード</label>
        <input type="text" name="current_password" id="current_password">
    </div>
    @error('current_password')
            <p class="validation-comment">{{ $message }}</p>
        @enderror

    <div>
        <label for="new_password">新パスワード</label>
        <input type="text" name="new_password" id="new_password">
    </div>
    @error('new_password')
            <p class="validation-comment">{{ $message }}</p>
        @enderror

    <div>
        <label for="new_password_confirmation">新パスワード確認</label>
        <input type="text" name="new_password_confirmation" id="new_password_confirmation">
    </div>

    <button type="submit" class="btn__change-password">登録</button>

</form>

@endsection