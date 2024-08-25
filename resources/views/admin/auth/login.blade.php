@extends('admin.layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="card-header">
            <a href="{{ route('admin.show.register') }}">新規登録はこちら</a>
        </div>
        <h1>管理画面ログイン</h1>
        <div class="card-body">
            <form class="admin" method="POST" action="{{ route('admin.login') }}">
                @csrf
                <table>
                    <tr>
                        <th><label for="email" class="col-md-4 col-form-label text-md-end">メールアドレス</label></th>
                        <td><input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                            @if($errors->has('email'))
                                <p>{{ $errors->first('email') }}</p>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th><label for="password" class="col-md-4 col-form-label text-md-end">パスワード</label></th>
                        <td><input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                            @if($errors->has('password'))
                                <p>{{ $errors->first('password') }}</p>
                            @endif
                        </td>
                    </tr>
                </table>
                <button type="submit" class="btn-primary">ログイン</button>
            </form>
        </div>
    </div>
</div>
@endsection
