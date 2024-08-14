<?php

namespace App\Http\Controllers;

// 追記
use Illuminate\Support\Facades\DB;

use App\Models\Curriculum;
use Illuminate\Http\Request;

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
        //
    }

    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */

    public function store( Request $request ) {
        //
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

    public function edit( Curriculum $curriculum ) {
        //
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
