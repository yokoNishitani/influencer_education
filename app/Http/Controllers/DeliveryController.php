<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Curriculum;
use App\Models\CurriculumProgress;
use App\Models\Classes;

class DeliveryController extends Controller
{
    public function showDelivery($id)
    {
        // カリキュラムIDに基づいてカリキュラムを取得
        $curriculum = Curriculum::findOrFail($id);
        
        // カリキュラムに紐づく進捗やクラス情報を取得
        $curriculumProgress = CurriculumProgress::where('curriculum_id', $id)->get();
        $classes = Classes::where('curriculum_id', $id)->get();

        // ビューにデータを渡す
        return view('delivery', compact('curriculum', 'curriculumProgress', 'classes'));
    }
}