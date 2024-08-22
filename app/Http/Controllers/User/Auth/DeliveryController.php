<?php

namespace App\Http\Controllers\User\Auth;

use App\Http\Controllers\Controller;
use App\Models\Curriculum;
use App\Models\CurriculumProgress;
use App\Models\Class;
use Illuminate\Support\Facades\Auth;

class DeliveryController extends Controller
{
    public function index()
    {
        $curriculums = Curriculum::with(['class', 'progress'])->get();
        return view('user.delivery.index', compact('curriculums'));
    }
}

