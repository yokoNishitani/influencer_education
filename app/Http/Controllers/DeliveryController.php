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

    
    public function index($curriculums_id)
    {
        $delivery_times = DeliveryTime::where('curriculums_id', $curriculums_id)->get();
        return view('delivery', compact('delivery_times', 'curriculums_id'));
    }
    
    
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($curriculums_id)
    {
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
         // バリデーション
         $request->validate([
             'curriculums_id' => 'required|exists:curriculums,id',
             'delivery_from_date.*' => 'required|date',
             'delivery_from_time.*' => 'required|date_format:H:i',
             'delivery_to_date.*' => 'required|date',
             'delivery_to_time.*' => 'required|date_format:H:i',
         ]);
     
         // フォームから送信された配列を処理
         foreach ($request->delivery_from_date as $index => $deliveryFromDate) {
             $deliveryFrom = $deliveryFromDate . ' ' . $request->delivery_from_time[$index];
             $deliveryTo = $request->delivery_to_date[$index] . ' ' . $request->delivery_to_time[$index];
     
             // 新しいDeliveryTimeレコードを作成
             DeliveryTime::create([
                 'curriculums_id' => $request->input('curriculums_id'),
                 'delivery_from' => $deliveryFrom,
                 'delivery_to' => $deliveryTo,
             ]);
         }
     
         // 成功メッセージと共にリダイレクト
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
    public function edit($curriculums_id, DeliveryTime $deliveryTime)
    {
        return view('delivery.edit', compact('curriculums_id', 'deliveryTime'));
    }
    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DeliveryTime  $deliveryTime
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $curriculums_id, DeliveryTime $deliveryTime)
    {
        $request->validate([
            'delivery_from_date' => 'required|date',
            'delivery_from_time' => 'required|date_format:H:i',
            'delivery_to_date' => 'required|date',
            'delivery_to_time' => 'required|date_format:H:i',
        ]);
    
        // 日付と時間を結合
        $deliveryFrom = $request->delivery_from_date . ' ' . $request->delivery_from_time;
        $deliveryTo = $request->delivery_to_date . ' ' . $request->delivery_to_time;
    
        // 既存のDeliveryTimeレコードを更新
        $deliveryTime->update([
            'delivery_from' => $deliveryFrom,
            'delivery_to' => $deliveryTo,
        ]);
    
        // 成功メッセージと共にリダイレクト
        return back()->with('success', '配信時間の更新が成功しました.');
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