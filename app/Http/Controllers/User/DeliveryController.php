<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Curriculum;
use App\Models\CurriculumProgress;
use App\Models\Grade;
use Illuminate\Http\Request;

class DeliveryController extends Controller
{

    public function __construct()
    {
        // このコントローラーのすべてのメソッドに認証ミドルウェアを適用
        $this->middleware('auth');
    }

    
    public function showDelivery($id)
    {
        
        $curriculum = Curriculum::findOrFail($id);
        $curriculumProgress = CurriculumProgress::where('curriculums_id', $id)
        ->where('users_id', auth()->id())  // ログインしているユーザーの進捗を取得
        ->first();

        $grades = Grade::all();
        $grade = $grades->where('id', $curriculum->grade_id)->first();

       $isCompleted = $curriculumProgress !== null && $curriculumProgress->clear_flg == 1;
        $withinDeliveryPeriod = true; 

    // このカリキュラムに対応する配信期間を取得
    $deliveryTime = $curriculum->deliveryTime;
    $now = now();  // 現在の時間

    $isWithinDeliveryPeriod = true;

    // 現在の時間が配信期間外かどうかを確認
    $isWithinDeliveryPeriod = false;
    if ($deliveryTime) {
        $isWithinDeliveryPeriod = ($now >= $deliveryTime->delivery_from && $now <= $deliveryTime->delivery_to);
    }
    $isAlwaysPublic = $curriculum->alway_delivery_flg;
    $canViewContent = $isAlwaysPublic || $isWithinDeliveryPeriod;
    
    return view('delivery', compact('curriculum', 'curriculumProgress', 'grades', 'grade', 'isCompleted', 'canViewContent'));
    }
    
    public function createCurriculum()
    {
        
        $curriculum = Curriculum::create([
            'title' => 'Sample Curriculum',
            'description' => 'This is a sample curriculum.',
            'thumbnail' => '/path/to/thumbnail.jpg',
            'video_url' => 'http://example.com/video',
            'alway_delivery_flg' => 1,
            'grade_id' => 1,
        ]);

        
        return redirect()->back()->with('success', 'カリキュラムが作成されました！');
    }

    public function markCompleted($id)
    {
        $curriculum = Curriculum::findOrFail($id);

        // 受講進捗を作成
        CurriculumProgress::create([
            'curriculums_id' => $curriculum->id,
            'users_id' => auth()->id(),
            'clear_flg' => 1,
        ]);

        return redirect()->back()->with('success', 'カリキュラムが受講済みとしてマークされました。');
    }
    
}