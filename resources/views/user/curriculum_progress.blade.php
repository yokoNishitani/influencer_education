@extends('user.layouts.app')

@section('title', '授業進捗')

@push('css/user/user_article')
<link href="{{ asset('css/user/user_progress.css') }}" rel="stylesheet">
@endpush

@section('content')
<div class="back">
    <a href="{{ route('user.show.top') }}">戻る</a>
</div>
<div class="wrap__user">
    <div>
        <img src="{{ asset($users->profile_image) }}" alt="profile_image" width="100" height="auto">
    </div>

    <div>
        <p class="user-name">{{ Auth::user()->name }}さんの授業進捗</p>
        <div class="wrap__user-grade">
            <p>現在の学年：</p>
            @php
            $gradeName = Auth::user()->grade->name;

            if (strpos($gradeName, '小学') === 0) {
            $gradeClass = 'elementary';
            } else if (strpos($gradeName, '中学') === 0) {
            $gradeClass = 'junior-high';
            } else if (strpos($gradeName, '高校') === 0) {
            $gradeClass = 'high-school';
            } else {
            $gradeClass = 'default';
            }
            @endphp
            <p class="bg__user-grade {{ $gradeClass }}">
                {{ $gradeName }}
            </p>
        </div>
    </div>
</div>

<div class="wrap__curriculum">
    @foreach ($grades as $grade)
    @php
    $gradeClass = '';
    $gradeName = $grade->name;

    // 学年によるクラスの設定
    if (strpos($gradeName, '小学') === 0) {
    $gradeClass = 'elementary';
    } else if (strpos($gradeName, '中学') === 0) {
    $gradeClass = 'junior-high';
    } else if (strpos($gradeName, '高校') === 0) {
    $gradeClass = 'high-school';
    } else {
    $gradeClass = 'default';
    }
    @endphp
    <div class="wrap__curriculum--grade">
        <p class="bg__user-grade {{ $gradeClass }}">{{ $grade->name }}</p>
        <ul>
            @foreach ($grade->curriculums as $curriculum)
            @php
            $disabled = $grade->id > $users->grade_id ? 'disabled' : '';
            $completed = $curriculum->clear_flg ? '受講済' : '';
            @endphp
            <li>
                <a href="{{ !$disabled ? route('user.show.delivery', $curriculum->id) : '#' }}" class="{{ $disabled }}">
                    @if ($completed)
                    <span class="completed">{{ $completed }}</span>
                    @endif
                    {{ $curriculum->title }}
                </a>
            </li>
            @endforeach
        </ul>
    </div>
    @endforeach
</div>
@endsection