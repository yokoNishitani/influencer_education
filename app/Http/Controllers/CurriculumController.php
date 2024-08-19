<?php

namespace App\Http\Controllers;

use App\Models\Curriculum;
use App\Models\Grade;
// Gradeモデルをインポート
use App\Models\DeliveryTime;
// DeliveryTimeモデルをインポート

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Log;

class CurriculumController extends Controller {
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */

    public function index()
    {
        $grades = Grade::all(); // 学年のリストを取得
        $curriculums = Curriculum::all(); // すべての授業内容を取得
        $delivery_times = DeliveryTime::all(); // すべての配信時間を取得
    
        return view('culliculum_list', compact('grades', 'curriculums', 'delivery_times'));
    }
    

    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */

    public function create() {
        // Grades を取得
        $grades = Grade::all();

        // フォーム表示のためのメソッド
        return view( 'culliculum_create', compact( 'grades' ) );
    }

    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:20',
            'description' => 'required|max:100',
            'thumbnail' => 'nullable|image|max:1024',
            'video_url' => 'nullable|max:255',
            'grade_id' => 'required|integer',
        ]);
        
    
        $curriculum = new Curriculum;
        $curriculum->title = $request->input('title');
        $curriculum->description = $request->input('description');
        $curriculum->grade_id = $request->input('grade_id');
        $curriculum->video_url = $request->input('video_url');
    
        if ($request->hasFile('thumbnail')) {
            $name = $request->file('thumbnail')->getClientOriginalName();
            $request->file('thumbnail')->move('storage/images', $name);
            $curriculum->thumbnail = $name;
        }
    
        $curriculum->save();
    
        return redirect()->route('curriculums.index')->with('success', 'カリキュラムを登録しました');
    }
    

    /**
    * Display the specified resource.
    *
    * @param  \App\Models\Curriculum  $curriculum
    * @return \Illuminate\Http\Response
    */

    public function show( Curriculum $curriculum ) {
        //
    }

    /**
    * Show the form for editing the specified resource.
    *
    * @param  \App\Models\Curriculum  $curriculum
    * @return \Illuminate\Http\Response
    */

    public function edit($id)
    {
        $curriculum = Curriculum::find($id);
        if (!$curriculum) {
            abort(404, 'カリキュラムが見つかりません: ID = ' . $id);
        }
        
        $grades = Grade::all();
        return view('culliculum_edit', compact('curriculum', 'grades'));
    }
    

    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  \App\Models\Curriculum  $curriculum
    * @return \Illuminate\Http\Response
    */

    public function update(Request $request, $id)
    {
        $curriculum = Curriculum::findOrFail($id);
        $request->validate([
            'title' => 'required|max:20',
            'description' => 'required|max:100',
            'thumbnail' => 'nullable|image|max:1024',
            'video_url' => 'nullable|max:255',
            'grade_id' => 'required|integer',
        ]);
        
        $curriculum->title = $request->input('title');
        $curriculum->description = $request->input('description');
        $curriculum->grade_id = $request->input('grade_id');
        $curriculum->video_url = $request->input('video_url');
        
        if ($request->hasFile('thumbnail')) {
            if ($curriculum->thumbnail) {
                \Storage::delete('public/images/' . $curriculum->thumbnail);
            }
            $name = $request->file('thumbnail')->getClientOriginalName();
            $request->file('thumbnail')->move('storage/images', $name);
            $curriculum->thumbnail = $name;
        }
        
        $curriculum->save();
        
        return redirect()->route('curriculums.index')->with('success', 'カリキュラムを更新しました');
    }
    
    

    /**
    * Remove the specified resource from storage.
    *
    * @param  \App\Models\Curriculum  $curriculum
    * @return \Illuminate\Http\Response
    */

    public function destroy( Curriculum $curriculum ) {
        //
    }
}