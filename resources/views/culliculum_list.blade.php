@extends('app')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="text-right">
                <a class="btn btn-success" href="#">戻る</a>
            </div>
            <div class="text-left">
                <h1>授業一覧culliculum_list.blade.php</h1>
            </div>
            <div class="text-right">
                <a class="btn btn-success" href="{{ url('/culliculum_create') }}">新規登録</a>

            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <!-- 左側部分 -->
            <div class="col-2">
                <button type="button" class="btn btn-primary">小学生１年生</button>
                <button type="button" class="btn btn-primary">小学生２年生</button>
                <button type="button" class="btn btn-primary">小学生３年生</button>
                <button type="button" class="btn btn-primary">小学生４年生</button>
                <button type="button" class="btn btn-primary">小学生５年生</button>
                <button type="button" class="btn btn-primary">小学生６年生</button>
                <button type="button" class="btn btn-primary">中学生１年生</button>
                <button type="button" class="btn btn-primary">中学生２年生</button>
                <button type="button" class="btn btn-primary">中学生３年生</button>
                <button type="button" class="btn btn-warning">高校生１年生</button>
                <button type="button" class="btn btn-warning">高校生２年生</button>
                <button type="button" class="btn btn-warning">高校生３年生</button>



            </div>

            <!-- 右側部分 -->
            <div class="col-10">
                <!-- 一覧パーツ -->
                <button type="button" class="btn btn-primary">小学生１年生</button>
                <h1>一覧表示</h1>
                <div class="row">
                    @foreach($curriculums as $curriculum)
                        <div class="col-md-4 mb-4">
                            <div class="card">
                                <table border="1" class="table">
                                    <tr>
                                        <td class="table-img">
                                        @if($curriculum->thumbnail)
                                        <img src="{{ asset('storage/images/'.$curriculum->thumbnail)}}" class="mx-auto" style="width:100%;">
                                        <!-- <img src="{{ asset('storage/images/'.$curriculum->thumbnail)}}" class="mx-auto" style="height:50px;"> -->

                                        @endif

                                        </td>

                                    </tr>
                                    <tr>
                                        <td><h4>{{$curriculum->title}}</h4></td>
                                    </tr>
                                    <tr>
                                        <td>07/24</td>
                                        <td>13:00-14:00</td>
                                    </tr>
                                    <tr>
                                        <td>07/24</td>
                                        <td>13:00-14:00</td>
                                    </tr>
                                    <tr>
                                        <td>07/24</td>
                                        <td>13:00-14:00</td>
                                    </tr>
                                    <tr>
                                        <td>07/24</td>
                                        <td>13:00-14:00</td>
                                    </tr>
                                    <tr>
                                        <td><a class="btn btn-success" href="{{ route('curriculums.edit', $curriculum->id) }}">授業内容編集</a></td>
                                        

                                        <td><a class="btn btn-success" href="{{ url('/delivery') }}">配信日時編集</a></td>    
                                    </tr>
                                </table>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
