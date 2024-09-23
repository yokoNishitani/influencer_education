<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Curriculum;
use App\Models\CurriculumProgress;
use App\Models\Grade;
use Illuminate\Http\Request;

class DeliveryController extends Controller
{
    public function showDelivery($id)
    {
        
        $curriculum = Curriculum::findOrFail($id);
        $curriculumProgress = CurriculumProgress::where('curriculum_id', $id)->get();
        $grades = Grade::all();

        return view('delivery', compact('curriculum', 'curriculumProgress', 'grades'));
    }
    
    public function createCurriculum()
    {
        // 新しいカリキュラムを作成
        $curriculum = Curriculum::create([
            'title' => 'Sample Curriculum',
            'description' => 'This is a sample curriculum.',
            'thumbnail' => '/path/to/thumbnail.jpg',
            'video_url' => 'http://example.com/video',
            'alway_delivery_flg' => 1,
            'grade_id' => 1
        ]);

        // 作成が完了したらリダイレクトなどの処理
        return redirect()->back()->with('success', 'カリキュラムが作成されました！');
    }
}