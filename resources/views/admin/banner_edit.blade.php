@extends('admin.layouts.app')

@section('title', 'バナー管理')

@section('content')
    <div class="container">
        <div class="row">
            <button type="button" class="btnModoru" onClick="history.back()">←戻る</button>
            <h1>バナー管理</h1>
        </div>
        <div class="banner">
            <form action="route('register.banner.edit')" method="post" enctype="multipart/form-data">
                @csrf
                <table>
                    <tbody>
                        @foreach ($banners as $banner)
                        <tr>
                            <td><input type="file" id="image" name="image" value="{{ old('image') }}">
                                <img src="{{ asset($banner->image) }}"></td>
                            <td><input data-banner_id="{{ $banner->id }}" type="button" class="btnBannerSakujo" value="-"></td>
                                @if($errors->has('image'))
                                    <p>{{ $errors->first('image') }}</p>
                                @endif
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="addBaneer">
                    <input data-banner_id="{{ $banner->id }}" type="button" class="btnAddBanner" value="+">
                </div>
                <button type="submit" class="btnRegisterBanner">登録</button>
            </form>
        </div>
    </div>
@endsection