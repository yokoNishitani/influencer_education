@extends('app')
  
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="text-left">
                <h2 style="font-size:1rem;">授業一覧culliculum_list.blade.php</h2>
            </div>
            <div class="text-right">
            <a class="btn btn-success" href="#">新規登録</a>
            </div>
        </div>
    </div>


    <!-- 一覧パーツ -->
    <h1>一覧表示</h1>


    <table>
    <tr>
    <th>ID</th>
    <th>タイトル</th>
    <th>サムネイル</th>
    <th>説明文</th>
    <th>動画URL</th>
    <th>常時公開フラグ</th>
    <th>クラスID</th>
    </tr>
    @foreach($curriculums as $curriculum)

    <tr>
    <td>{{$curriculum->id}}</td>
    <td>{{$curriculum->title}}</td>
    <td>{{$curriculum->thumbnail}}</td>
    <td>{{$curriculum->description}}</td>
    <td>{{$curriculum->video_url}}</td>
    <td>{{$curriculum->alway_delivery_flg}}</td>
    <td>{{$curriculum->grade_id}}</td>
    </tr>
    @endforeach
    </table>    
 
@endsection


