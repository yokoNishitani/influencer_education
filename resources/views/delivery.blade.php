@extends('app')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="text-right">
                <a class="btn btn-success" href="{{ url('/culliculum_list') }}">戻る</a>
            </div>

            <div class="text-left">
                <h1>配信日時設定 delivery.blade.php</h1>
                <h2>タイトルが入る</h2>
            </div>
        </div>
    </div>

    <form action="{{ route('delivery.store', ['curriculums_id' => $curriculums_id]) }}" method="POST">
        @csrf
        <input type="hidden" name="curriculums_id" value="{{ $curriculums_id }}">

        <div id="rows-container">
            <div class="row mb-2">
                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="col">
                    <input type="date" name="delivery_from_date[]" class="form-control" placeholder="年月日" aria-label="年月日">
                </div>

                <div class="col">
                    <input type="time" name="delivery_from_time[]" class="form-control" placeholder="時間" aria-label="時間">
                </div>

                <div class="col">
                    <p>　～　</p>
                </div>

                <div class="col">
                    <input type="date" name="delivery_to_date[]" class="form-control" placeholder="年月日" aria-label="年月日">
                </div>

                <div class="col">
                    <input type="time" name="delivery_to_time[]" class="form-control" placeholder="時間" aria-label="時間">
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
            <button type="submit" class="btn btn-primary btn-lg mt-2">登録</button>
        </div>
    </form>

    <!-- jQueryの読み込み -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- クリックイベントで配信日時入力欄の増減 -->
    <script>
    $(document).ready(function() {
        $('#add-row').click(function() {
            var newRow = `
                <div class="row mb-2">
                    <div class="col">
                        <input type="date" name="delivery_from_date[]" class="form-control" placeholder="年月日" aria-label="年月日">
                    </div>
                    <div class="col">
                        <input type="time" name="delivery_from_time[]" class="form-control" placeholder="時間" aria-label="時間">
                    </div>
                    <div class="col">
                        <p>　～　</p>
                    </div>
                    <div class="col">
                        <input type="date" name="delivery_to_date[]" class="form-control" placeholder="年月日" aria-label="年月日">
                    </div>
                    <div class="col">
                        <input type="time" name="delivery_to_time[]" class="form-control" placeholder="時間" aria-label="時間">
                    </div>
                    <div class="col">
                        <button type="button" class="btn btn-danger rounded-circle remove-row">ー</button>
                    </div>
                </div>
            `;
            $('#rows-container').append(newRow);
        });

        $(document).on('click', '.remove-row', function() {
            $(this).closest('.row').remove();
        });
    });
    </script>
@endsection
