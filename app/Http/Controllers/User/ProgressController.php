<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Grade;
use App\Models\Curriculum;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProgressController extends Controller
{

    //配信（仮）
    public function showDelivery()
    {
        return view('user.delivery');
    }

    public function showProgress()
    {
        $users = Auth::user();
        $grades = Grade::with(['curriculums' => function ($query) use ($users) {
            $query->leftJoin('curriculum_progress', function ($join) use ($users) {
                $join->on('curriculums.id', '=', 'curriculum_progress.curriculums_id')
                    ->where('curriculum_progress.users_id', '=', $users->id);
            })
                ->select('curriculums.*', 'curriculum_progress.clear_flg');
        }])->orderBy('id')->get();

        if (!$users->profile_image) {
            $users->profile_image = 'storage/images/profile/no_image.jpg';
        }

        return view('user.curriculum_progress', compact('grades', 'users'));
    }
}
