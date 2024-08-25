<<<<<<< HEAD
@extends('admin.layouts.app')
=======
@extends('layouts.app')
>>>>>>> d617656c259657ce65326b22ad36d8bf43685aff

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="card-header">
            <a href="{{ route('admin.show.login') }}">ログインはこちらから</a>
        </div>
        <h1>新規管理ユーザー登録</h1>

        <div class="card-body">
            <form class="admin" method="POST" action="{{ route('admin.register') }}">
                @csrf
                <table>
                    <tr>
                        <th><label for="name" class="col-md-4 col-form-label text-md-end">ユーザーネーム</label></th>
                        <td><input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                            @if($errors->has('name'))
                                <p>{{ $errors->first('name') }}</p>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th><label for="kana" class="col-md-4 col-form-label text-md-end">カナ</label></th>
                        <td><input id="kana" type="text" class="form-control @error('kana') is-invalid @enderror" name="kana" value="{{ old('kana') }}" required autocomplete="kana" autofocus>
                            @if($errors->has('kana'))
                                <p>{{ $errors->first('kana') }}</p>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th><label for="email" class="col-md-4 col-form-label text-md-end">メールアドレス</label></th>
                        <td><input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                            @if($errors->has('email'))
                                <p>{{ $errors->first('email') }}</p>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th><label for="password" class="col-md-4 col-form-label text-md-end">パスワード</label></th>
                        <td><input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                            @if($errors->has('password'))
                                <p>{{ $errors->first('password') }}</p>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th><label for="password-confirm" class="col-md-4 col-form-label text-md-end">パスワード確認</label></th>
                        <td><input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password"></td>
                            @if($errors->has('password_confirmation'))
                                <p>{{ $errors->first('password_confirmation') }}</p>
                            @endif
                    </tr>
                </table>
                <button type="submit" class="btn-primary">登録</button>
            </form>
        </div>
    </div>
</div>
@endsection
