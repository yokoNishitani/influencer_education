<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class BannerController extends Controller
{
    //一覧表示
    public function showBannerEdit() {
        //インスタンス生成
        $model = new Banner();
        $banners = $model->getBanner();

        return view('admin.banner_edit', ['banners' => $banners]);
    }

    //削除処理
    public function destroy(Request $request, Banner $banners) {
        $banners = Banner::findOrFail($request->id);
        $banners->delete();
    }

    //新規登録
    public function registerBannerEdit(Request $request) {

        $request->validate([
            'image' => 'nullable|array',
            'image.*' => 'image', 
        ]);
    
        $bannerIds = $request->input('banner_id', []);
        $images = $request->file('image', []);
        

        DB::beginTransaction();
        try {
            foreach ($bannerIds as $index => $bannerId) {
                $image = $images[$index] ?? null;
                if ($image) {
                    $file_name = $image->getClientOriginalName();
                    $image->storeAs('public/image', $file_name);
                    $img_path = 'storage/image/' . $file_name;
    
                    $model = new Banner();
                    $model->registBanner($bannerId, $img_path);
                }
            }
            DB::commit();
        } catch(\Exception $e) {
            DB::rollBack();
            return back();
        }

        return redirect(route('admin.show.banner.edit'));
    }
}
