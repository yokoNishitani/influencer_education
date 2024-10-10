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

       $isCompleted = $curriculumProgress !== null && $curriculumProgress->clear_fig == 1;
        $withinDeliveryPeriod = true; 

        return view('delivery', compact('curriculum', 'curriculumProgress', 'grades','grade', 'isCompleted', 'withinDeliveryPeriod'));
    }
    
    public function createCurriculum()
    {
        
        $curriculum = Curriculum::create([
            'title' => 'Sample Curriculum',
            'description' => 'This is a sample curriculum.',
            'thumbnail' => '/path/to/thumbnail.jpg',
            'video_url' => 'http://example.com/video',
            'alway_delivery_flg' => 1,
            'grade_id' => 1
        ]);

        
        return redirect()->back()->with('success', 'カリキュラムが作成されました！');
    }
}