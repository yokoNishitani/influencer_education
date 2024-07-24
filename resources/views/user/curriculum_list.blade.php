@extends('user.layouts.app')

@section('title', '時間割')

@section('content')
    <div class="container">
        <div class="row">
            <button type="button" class="btnModoru" onClick="history.back()">←戻る</button>
            <a href="{{ route('drink.index') }}">◀</a>
                <p>{{ $errors->first('image') }}</p>
            <a href="{{ route('drink.index') }}">▶</a>
            <p>{{ $curriculums->grade_id->name }}</p>
        </div>
        <div>
            @yield('sidebar')
        </div>
        <div class="curriculumList">
            @foreach ($curriculums as $curriculum)
                <div class="thumbnail">
                    <img src="{{ asset( $curriculum->thumbnail ) }}">
                </div>

                <div class="title">
                    <p>{{ $curriculum->title}}</p>
                </div>

                <div class="deliveryTime">
                    <p>{{ $curriculum->delivery_from}}～{{ $curriculum->delivery_to}}</p>
                </div>
            @endforeach
        </div>
    </div>
@endsection