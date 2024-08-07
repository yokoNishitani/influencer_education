<?php

namespace App\Http\Controllers;

use App\Models\Curriculum;
use App\Models\Grade; // Gradeモデルをインポート

use Illuminate\Http\Request;


use Illuminate\Support\Facades\Log;


class CurriculumController extends Controller {
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */

    public function index() {
        $curriculums = Curriculum::all();
        return view( 'culliculum_list', compact( 'curriculums' ) );
    }

    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */

    public function create() {
        // フォーム表示のためのメソッド
        return view( 'culliculum_create' );
    }

    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */

    public function store(Request $request) {
        $request->validate([
            'title' => 'required|max:20',
            'description' => 'required|max:100',
            'thumbnail' => 'image|max:1024',
            'video_url' => 'nullable|max:255', 
            'grade_id' => 'required|integer',
        ]);

        $curriculum = new Curriculum;
        $curriculum->title = $request->input('title');
        $curriculum->description = $request->input('description');
        $curriculum->grade_id = $request->input('grade_id');

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

        // Grades を取得
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


    public function update(Request $request, Curriculum $curriculum)
    {
        $request->validate([
            'title' => 'required|max:20',
            'description' => 'required|max:100',
            'thumbnail' => 'image|max:1024',
            'video_url' => 'nullable|max:255', // ここが nullable になっていることを確認
            'grade_id' => 'required|integer',
        ]);
    
        // データの更新
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
