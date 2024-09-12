<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Curriculum;
use App\Models\DeliveryTime;

class ScheduleController extends Controller
{
    public function showCurriculumList()
    {
        // curriculumsとdelivery_timesのデータを取得
        $curriculums = Curriculum::all();
        $deliveryTimes = DeliveryTime::all();

        // ビューにデータを渡す
        return view('curriculum_list', compact('curriculums', 'deliveryTimes'));
    }
}
