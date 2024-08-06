@extends('app')
  
@section('content')
    <div class="row">
        <div class="col-lg-12">

            <div class="text-right">
                <a class="btn btn-success" href="{{ url('/culliculum_list') }}">戻る</a>
            </div>

            <div class="text-left">
                <h1>配信日時設定delivery.blade.php</h1>
                <h2>タイトルが入る</h2>
            </div>

        </div>
    </div>

    <div id="rows-container">
        <div class="row mb-2">
            <div class="col">
                <input type="text" class="form-control" placeholder="年月日" aria-label="年月日">
            </div>

            <div class="col">
                <input type="text" class="form-control" placeholder="日時" aria-label="日時">
            </div>

            <div class="col">
                <p>　～　</p>
            </div>

            <div class="col">
                <input type="text" class="form-control" placeholder="年月日" aria-label="年月日">
            </div>

            <div class="col">
                <input type="text" class="form-control" placeholder="日時" aria-label="日時">
            </div>

            <div class="col">
                <button type="button" class="btn btn-danger rounded-circle remove-row">ー</button>
            </div>
        </div>
    </div>

    <!-- ボタンここから -->
    <div class="pull-right" style="text-align:left;">
        <button type="button" class="btn btn-success rounded-circle" id="add-row">＋</button>
    </div>

    <div class="pull-right" style="text-align:center;">
        <button type="submit" class="btn btn-primary btn-lg mt-2">登録</button>
    </div>

    <!-- 必要なJavaScriptライブラリ -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script>
        $(document).ready(function(){
            // 行追加ボタンのクリックイベント
            $('#add-row').click(function() {
                var newRow = `
                    <div class="row mb-2">
                        <div class="col">
                            <input type="text" class="form-control" placeholder="年月日" aria-label="年月日">
                        </div>

                        <div class="col">
                            <input type="text" class="form-control" placeholder="日時" aria-label="日時">
                        </div>

                        <div class="col">
                            <p>　～　</p>
                        </div>

                        <div class="col">
                            <input type="text" class="form-control" placeholder="年月日" aria-label="年月日">
                        </div>

                        <div class="col">
                            <input type="text" class="form-control" placeholder="日時" aria-label="日時">
                        </div>

                        <div class="col">
                            <button type="button" class="btn btn-danger rounded-circle remove-row">ー</button>
                        </div>
                    </div>
                `;
                $('#rows-container').append(newRow);
            });

            // 動的に追加された行の削除ボタンのクリックイベント
            $(document).on('click', '.remove-row', function() {
                $(this).closest('.row').remove();
            });
        });
    </script>
@endsection
