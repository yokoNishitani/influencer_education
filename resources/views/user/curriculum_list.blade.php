@extends('user.layouts.app')

@section('title', '時間割')

@section('content')
    <div class="container">
        <div class="curriculumHeader">
            <a href="{{ route('user.show.top') }}" class="btnModoru">←戻る</a>
            <h2 class="schedule">
                <button class="changeMonth" data-page="{{$page-1}}" data-grade-id="{{ $grades->id }}">◀</button>
                <p id="scheduleText">{{$yyyy}}年{{$mm}}月スケジュール</p>
                <button class="changeMonth" data-page="{{$page+1}}" data-grade-id="{{ $grades->id }}">▶</button>
                @if($grades->id <= 6)
                    <button class="elementaryschool">{{ $grades->name }}</button>
                @elseif($grades->id >= 10)
                    <button class="highschool">{{ $grades->name }}</button>
                @else
                    <button class="juniorhighschool">{{ $grades->name }}</button>
                @endif
            </h2>
            <div id="userGrade" data-user-grade-id="{{ $user->grade_id }}"></div>
        </div>
        <div class="sidebar">
            @include('user.sidebar')
        </div>
        <div class="curriculumList">
            @foreach ($curriculums as $curriculum)
                <div class="curriculum">
                    <div><img src="{{ asset( $curriculum->thumbnail ) }}"></div>
                    <a href="{{ route('user.show.delivery', $curriculum->id) }}">{{ $curriculum->title }}</a>
                    @if($curriculum->alway_delivery_flg == 1)
                        <p>常時公開</p>
                    @else
                        @foreach ($curriculum->delivery_times as $deliveryTime)
                        <p>{{ $deliveryTime->formatted_delivery_from }}～{{ $deliveryTime->formatted_delivery_to }}</p>
                        @endforeach
                    @endif
                </div>
            @endforeach  
        </div>
    </div>
@endsection