<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Grade;
use App\Models\Curriculum;
use App\Models\DeliveryTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CurriculumController extends Controller
{
    public function showCurriculumList($id) {

        $model = new Grade();
        $grades = $model->showCurriculum($id);
        $model_curriculum = new Curriculum();
        $curriculums = $model_curriculum->getCurriculum();
        
        return view('curriculum_list', ['grades' => $grades, 'curriculums' => $curriculums]);
    }
}
