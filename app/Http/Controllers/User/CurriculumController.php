<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Grade;
use App\Models\Curriculum;
use App\Models\DeliveryTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class CurriculumController extends Controller
{
    public function showCurriculumList() {

        $page = request()->input('page', 0);

        $currentDate = Carbon::now()->addMonths($page);
        $yyyy = $currentDate->year;
        $mm = $currentDate->month;
        
        $gradeId = request()->input('grade_id', 1);
        $grades = Grade::find($gradeId);
        $deliveryFrom = Carbon::createFromDate($yyyy, $mm, 1)->startOfMonth();
        $deliveryTo = Carbon::createFromDate($yyyy, $mm, 1)->endOfMonth();

        $curriculums = Curriculum::where('grade_id', $gradeId)
                ->where(function($query) use ($deliveryFrom, $deliveryTo) {
                    $query->whereHas('delivery_times', function($query) use ($deliveryFrom, $deliveryTo) {
                    $query->where('delivery_from', '<=', $deliveryTo)
                        ->where('delivery_to', '>=', $deliveryFrom);
                        })->orWhere('alway_delivery_flg', 1);
                })->get();

        foreach($curriculums as $curriculum) {
            if($curriculum->delivery_times) {
                foreach($curriculum->delivery_times as $deliveryTime) {
                    $deliveryTime->formatted_delivery_from = Carbon::parse($deliveryTime->delivery_from)->format('m月d日 H:i');
                    $deliveryTime->formatted_delivery_to = Carbon::parse($deliveryTime->delivery_to)->format('m月d日 H:i');
                }
            }
        }

        $user = Auth::user();

        return view('user.curriculum_list', compact('page', 'yyyy', 'mm', 'grades', 'curriculums', 'user'));
    }
}
