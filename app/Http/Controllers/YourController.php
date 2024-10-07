<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Curriculum;
use App\Models\CurriculumProgress;

class YourController extends Controller
{
    public function markCompleted($id)
    {

        $curriculum = Curriculum::findOrFail($id);

        CurriculumProgress::create([
            'curriculums_id' => $curriculum->id,
            'progress' => 'completed',
        ]);
    
        return redirect()->back()->with('success', 'カリキュラムが受講済みとしてマークされました。');
    }
}
