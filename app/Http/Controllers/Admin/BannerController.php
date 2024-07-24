<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use Illuminate\Http\Request;
use App\Http\Requests\BannerRequest;
use Illuminate\Support\Facades\DB;


class BannerController extends Controller
{
    //一覧表示
    public function showBannerEdit(Request $request) {
        //インスタンス生成
        $model = new Banner();
        $banners = $model->getBanner();

        return view('banner_edit', ['banners' => $banners]);
    }

    //削除処理
    public function destroy(Request $request, Banner $banners) {
        $banners = Banner::findOrFail($request->id);
        $banners->delete();
    }

    //新規登録
    public function registerBannerEdit(BannerRequest $request) {
       
        $image = $request->file('image');
        $file_name = $image->getClientOriginalName();
        $image->storeAs('public/image', $file_name);
        $img_path = 'storage/image/' . $file_name;

        DB::beginTransaction();
        
        try{
            $model = new Banner();
            $model->registBanner($img_path);
            DB::commit();
        } catch(\Exception $e) {
            DB::rollBack();
            return back();
        }

        return redirect(route('show.banner.edit'));
    }
}
