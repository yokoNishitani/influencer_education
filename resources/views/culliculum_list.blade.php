@extends('app')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="text-right">
                <a class="btn btn-success" href="{{ route('curriculums.create') }}">新規作成</a> <!-- 新規作成ボタン -->
            </div>
            <div class="text-left">
                <h1>授業一覧</h1>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <!-- 左側部分 -->
            <div class="col-2">
                @foreach($grades as $grade)
                    <button type="button" class="btn btn-primary" data-grade-id="{{ $grade->id }}">{{ $grade->name }}</button>
                @endforeach
            </div>

            <!-- 右側部分 -->
            <div class="col-10">
                <h1 id="selected-grade-name">すべての授業</h1> <!-- 選択された学年を表示する部分 -->
                <div class="row">
                    @foreach($curriculums as $curriculum)
                        <div class="col-md-4 mb-4 curriculum-card" data-grade-id="{{ $curriculum->grade_id }}">
                            <div class="card">
                                <table border="1" class="table">
                                    <tr>
                                        <td class="table-img">
                                            @if($curriculum->thumbnail)
                                                <img src="{{ asset('storage/images/'.$curriculum->thumbnail) }}" class="mx-auto" style="width:100%;">
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><h4>{{ $curriculum->title }}</h4></td>
                                    </tr>

                                    <!-- 配信日時表示 -->
                                    @if($delivery_times->where('curriculums_id', $curriculum->id)->isNotEmpty())
                                        @foreach($delivery_times->where('curriculums_id', $curriculum->id) as $delivery_time)
                                            <tr>
                                                <td>{{ \Carbon\Carbon::parse($delivery_time->delivery_from)->format('m/d') }}</td>
                                                <td>{{ \Carbon\Carbon::parse($delivery_time->delivery_from)->format('H:i') }} - {{ \Carbon\Carbon::parse($delivery_time->delivery_to)->format('H:i') }}</td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="2">配信日時が設定されていません。</td>
                                        </tr>
                                    @endif

                                    <tr>
                                        <td><a class="btn btn-success" href="{{ route('curriculums.edit', $curriculum->id) }}">授業内容編集</a></td>
                                        <td><a href="{{ route('delivery.index', ['curriculums_id' => $curriculum->id]) }}" class="btn btn-primary">配信日時設定</a></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <!-- JavaScript で学年ボタンのクリックイベントを処理 -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const gradeButtons = document.querySelectorAll('.btn-primary[data-grade-id]');
            const selectedGradeName = document.getElementById('selected-grade-name');
            
            gradeButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const gradeId = this.getAttribute('data-grade-id');
                    const gradeName = this.textContent; // ボタンのテキスト（学年名）を取得
                    
                    // カードの表示を更新
                    document.querySelectorAll('.curriculum-card').forEach(card => {
                        card.style.display = card.getAttribute('data-grade-id') === gradeId || gradeId === '' ? 'block' : 'none';
                    });

                    // 選択された学年名を表示
                    selectedGradeName.textContent = gradeName;
                });
            });

            // 最初にすべての授業を表示する設定
            document.querySelectorAll('.curriculum-card').forEach(card => card.style.display = 'block');
        });
    </script>
@endsection
