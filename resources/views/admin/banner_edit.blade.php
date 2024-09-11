@extends('admin.layouts.app')

@section('title', 'バナー管理')

@section('content')
    <div class="container">
        <div class="bannerHeader">
            <a href="{{ route('admin.show.top') }}" class="btnModoru">←戻る</a>
            <h1>バナー管理</h1>
        </div>
        <div class="banner">
            <form action="{{ route('admin.register.banner.edit') }}" method="post" enctype="multipart/form-data">
                @csrf
                <table class="bannerList">
                    <tbody>
                        @foreach ($banners as $banner)
                        <tr>
                            <td>
                                <img src="{{ asset($banner->image) }}">
                            </td>
                            <td>
                                <input type="file" name="image[]">
                                <input type="hidden" name="banner_id[]" value="{{ $banner->id }}">
                            </td>
                            <td>
                                <input data-banner_id="{{ $banner->id }}" type="button" class="btnBannerSakujo" value="-">
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                    @if($errors->has('image.*'))
                        <strong>{{ $errors->first('image.*') }}</strong>
                    @endif
                <div class="addBaneer">
                    <input type="button" class="btnAddBanner" value="+">
                </div>
                <button type="submit" class="btnRegisterBanner">登録</button>
            </form>
        </div>
    </div>
@endsection