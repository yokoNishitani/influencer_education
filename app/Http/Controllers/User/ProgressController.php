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
        $grades = Grade::with('curriculums')
            ->orderBy('id')
            ->get();

        if (!$users->profile_image) {
            $users->profile_image = 'storage/images/profile/no_image.jpg';
        }

        return view('user.curriculum_progress', compact('grades', 'users'));
    }
}
