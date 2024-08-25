@extends('user.layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('user.register') }}">
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
                            <th><label for="name_kana" class="col-md-4 col-form-label text-md-end">カナ</label></th>
                            <td><input id="name_kana" type="text" class="form-control @error('kana') is-invalid @enderror" name="name_kana" value="{{ old('name_kana') }}" required autocomplete="name_kana" autofocus>
                                @if($errors->has('name_kana'))
                                    <p>{{ $errors->first('name_kana') }}</p>
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
    </div>
</div>
@endsection
