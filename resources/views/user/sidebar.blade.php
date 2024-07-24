@extends('user.curriculum_list')

@section('sidebar')
    <div class="sidebar">
        <div class="elementarySchool">
            <a href="{{ route('show.curriculum', $grade->id(1) }}">小学校1年生</a>
        </div>

        <div class="elementarySchool">
            <a href="{{ route('show.curriculum', $grade->id(2) }}">小学校2年生</a>
        </div>

        <div class="elementarySchool">
            <a href="{{ route('show.curriculum', $grade->id(3) }}">小学校3年生</a>
        </div>

        <div class="elementarySchool">
            <a href="{{ route('show.curriculum', $grade->id(4) }}">小学校4年生</a>
        </div>

        <div class="elementarySchool">
            <a href="{{ route('show.curriculum', $grade->id(5) }}">小学校5年生</a>
        </div>

        <div class="elementarySchool">
            <a href="{{ route('show.curriculum', $grade->id(6) }}">小学校6年生</a>
        </div>

        <div class="juniorhightSchool">
            <a href="{{ route('show.curriculum', $grade->id(7) }}">中学校1年生</a>
        </div>

        <div class="juniorhighSchool">
            <a href="{{ route('show.curriculum', $grade->id(8) }}">中学校2年生</a>
        </div>

        <div class="juniorhighSchool">
            <a href="{{ route('show.curriculum', $grade->id(8) }}">中学校3年生</a>
        </div>

        <div class="highschool">
            <a href="{{ route('show.curriculum', $grade->id(10) }}">高校1年生</a>
        </div>

        <div class="highschool">
            <a href="{{ route('show.curriculum', $grade->id(11) }}">高校2年生</a>
        </div>

        <div class="highschool">
            <a href="{{ route('show.curriculum', $grade->id(12) }}">高校3年生</a>
        </div>
    </div>
@endsection