<?php

namespace App\Http\Controllers;

// 追記
use Illuminate\Support\Facades\DB;

use App\Models\DeliveryTime;
use Illuminate\Http\Request;



class DeliveryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $curriculums_id = 1; // ここは適切なカリキュラムIDに置き換えます
        $delivery_times = DeliveryTime::all();
        return view('delivery', compact('delivery_times', 'curriculums_id'));
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $curriculums_id = 1; // 実際のIDまたは取得するロジック
        return view('delivery.create', compact('curriculums_id'));
    }
    
    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    




public function store(Request $request)
{
    // デバッグ用
    // dd($request->all());

    $request->validate([
        'curriculums_id' => 'required|exists:curriculums,id',
        'date_from' => 'required|date',
        'time_from' => 'required|date_format:H:i',
        'date_to' => 'required|date',
        'time_to' => 'required|date_format:H:i',
    ]);

    $deliveryFrom = $request->date_from . ' ' . $request->time_from;
    $deliveryTo = $request->date_to . ' ' . $request->time_to;

    DeliveryTime::create([
        'curriculums_id' => $request->input('curriculums_id'),
        'delivery_from' => $deliveryFrom,
        'delivery_to' => $deliveryTo,
    ]);

    return back()->with('success', '配信時間の設定が成功しました.');
}
     



     
    
    

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DeliveryTime  $deliveryTime
     * @return \Illuminate\Http\Response
     */
    public function show(DeliveryTime $deliveryTime)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DeliveryTime  $deliveryTime
     * @return \Illuminate\Http\Response
     */
    public function edit(DeliveryTime $deliveryTime)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DeliveryTime  $deliveryTime
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DeliveryTime $deliveryTime)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DeliveryTime  $deliveryTime
     * @return \Illuminate\Http\Response
     */
    public function destroy(DeliveryTime $deliveryTime)
    {
        //
    }
}
