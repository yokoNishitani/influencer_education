<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\DeliveryTime;
use Illuminate\Http\Request;
use App\Models\Curriculum; // Curriculumモデルをインポート
use Illuminate\Support\Facades\Log;


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
        $curriculum = Curriculum::findOrFail($curriculums_id); // カリキュラムを取得
        return view('delivery', compact('delivery_times', 'curriculum', 'curriculums_id')); // 'delivery.blade' -> 'delivery'
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($curriculums_id)
    {
        $curriculum = Curriculum::findOrFail($curriculums_id); // カリキュラムを取得
        return view('delivery.create', compact('curriculum', 'curriculums_id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Log::info('Store method called with request:', $request->all());
    
        $request->validate([
            'curriculums_id' => 'required|exists:curriculums,id',
            'delivery_from_date.*' => 'required|date',
            'delivery_from_time.*' => 'required|date_format:H:i',
            'delivery_to_date.*' => 'required|date',
            'delivery_to_time.*' => 'required|date_format:H:i',
        ]);
    
        DB::transaction(function () use ($request) {
            foreach ($request->delivery_from_date as $index => $deliveryFromDate) {
                $deliveryFrom = $deliveryFromDate . ' ' . $request->delivery_from_time[$index];
                $deliveryTo = $request->delivery_to_date[$index] . ' ' . $request->delivery_to_time[$index];
    
                Log::info('Creating DeliveryTime record:', [
                    'curriculums_id' => $request->input('curriculums_id'),
                    'delivery_from' => $deliveryFrom,
                    'delivery_to' => $deliveryTo,
                ]);
    
                DeliveryTime::create([
                    'curriculums_id' => $request->input('curriculums_id'),
                    'delivery_from' => $deliveryFrom,
                    'delivery_to' => $deliveryTo,
                ]);
            }
        });
    
        return back()->with('success', '配信時間の設定が成功しました.');
    }
    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $curriculums_id
     * @return \Illuminate\Http\Response
     */
    public function edit($curriculums_id)
    {
        // カリキュラムを取得
        $curriculum = Curriculum::findOrFail($curriculums_id);
        $delivery_times = DeliveryTime::where('curriculums_id', $curriculums_id)->get();

        return view('delivery.edit', compact('curriculum', 'delivery_times', 'curriculums_id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $curriculums_id
     * @param  DeliveryTime  $deliveryTime
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
    
        DB::transaction(function () use ($request, $deliveryTime) {
            $deliveryFrom = $request->delivery_from_date . ' ' . $request->delivery_from_time;
            $deliveryTo = $request->delivery_to_date . ' ' . $request->delivery_to_time;
    
            $deliveryTime->update([
                'delivery_from' => $deliveryFrom,
                'delivery_to' => $deliveryTo,
            ]);
        });
    
        return back()->with('success', '配信時間の更新が成功しました.');
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  DeliveryTime  $deliveryTime
     * @return \Illuminate\Http\Response
     */
    public function destroy(DeliveryTime $deliveryTime)
    {
        // 削除処理はここに追加
    }
}
