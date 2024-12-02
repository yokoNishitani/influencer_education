@extends('app')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="text-right">
                <a class="btn btn-success" href="{{ url('/curriculum_list') }}">戻る</a>
            </div>

            <div class="text-left">
                <h1>配信日時設定</h1>
                <h2>{{ $curriculum->title }}</h2> <!-- カリキュラムのタイトル表示 -->
            </div>
        </div>
    </div>

    <form action="{{ route('delivery.store') }}" method="POST"> <!-- 新規登録用フォーム開始 -->
        @csrf
        <input type="hidden" name="curriculums_id" value="{{ $curriculums_id }}">

        <div id="rows-container">
            <!-- 既存の配信日時を表示 -->
            @if($delivery_times->isNotEmpty())
                @foreach($delivery_times as $delivery_time)
                    <div class="row mb-2">
                        <div class="col">
                            <input type="date" name="existing_delivery_from_date[{{ $delivery_time->id }}]" class="form-control" value="{{ \Carbon\Carbon::parse($delivery_time->delivery_from)->format('Y-m-d') }}" aria-label="開始日">
                        </div>

                        <div class="col">
                            <input type="time" name="existing_delivery_from_time[{{ $delivery_time->id }}]" class="form-control" value="{{ \Carbon\Carbon::parse($delivery_time->delivery_from)->format('H:i') }}" aria-label="開始時間">
                        </div>

                        <div class="col">
                            <p>　～　</p>
                        </div>

                        <div class="col">
                            <input type="date" name="existing_delivery_to_date[{{ $delivery_time->id }}]" class="form-control" value="{{ \Carbon\Carbon::parse($delivery_time->delivery_to)->format('Y-m-d') }}" aria-label="終了日">
                        </div>

                        <div class="col">
                            <input type="time" name="existing_delivery_to_time[{{ $delivery_time->id }}]" class="form-control" value="{{ \Carbon\Carbon::parse($delivery_time->delivery_to)->format('H:i') }}" aria-label="終了時間">
                        </div>

                        <div class="col">
                            <button type="button" class="btn btn-danger rounded-circle remove-row">ー</button>
                        </div>
                    </div>
                @endforeach
            @endif

            <!-- 新しい配信日時の入力欄 -->
            <div class="row mb-2">
                <div class="col">
                    <input type="date" name="delivery_from_date[]" class="form-control" placeholder="開始日" aria-label="開始日">
                </div>

                <div class="col">
                    <input type="time" name="delivery_from_time[]" class="form-control" placeholder="開始時間" aria-label="開始時間">
                </div>

                <div class="col">
                    <p>　～　</p>
                </div>

                <div class="col">
                    <input type="date" name="delivery_to_date[]" class="form-control" placeholder="終了日" aria-label="終了日">
                </div>

                <div class="col">
                    <input type="time" name="delivery_to_time[]" class="form-control" placeholder="終了時間" aria-label="終了時間">
                </div>

                <div class="col">
                    <button type="button" class="btn btn-danger rounded-circle remove-row">ー</button>
                </div>
            </div>
        </div>

        <div class="text-right">
            <button type="button" class="btn btn-success rounded-circle" id="add-row">＋</button>
        </div>

        <div class="text-right">
            <button type="submit" class="btn btn-primary btn-lg mt-2">登録</button> <!-- 登録ボタン -->
        </div>
    </form>

    <script>
$(document).ready(function() {
    $('#add-row').click(function() {
        var newRow = `
            <div class="row mb-2">
                <div class="col">
                    <input type="date" name="delivery_from_date[]" class="form-control" placeholder="開始日" aria-label="開始日">
                </div>
                <div class="col">
                    <input type="time" name="delivery_from_time[]" class="form-control" placeholder="開始時間" aria-label="開始時間">
                </div>
                <div class="col">
                    <p> ～ </p>
                </div>
                <div class="col">
                    <input type="date" name="delivery_to_date[]" class="form-control" placeholder="終了日" aria-label="終了日">
                </div>
                <div class="col">
                    <input type="time" name="delivery_to_time[]" class="form-control" placeholder="終了時間" aria-label="終了時間">
                </div>
                <div class="col">
                    <button type="button" class="btn btn-danger rounded-circle remove-row">ー</button>
                </div>
            </div>`;
        $('#rows-container').append(newRow);
    });

    $(document).on('click', '.remove-row', function() {
        $(this).closest('.row').remove();
    });
});
</script>

@endsection
