<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Banner extends Model
{
    use HasFactory;

    //情報取得用変数
    public function getBanner() {
        $banners = Banner::all();
        return $banners;
    }

    //登録処理
    public function registBanner($img_path) {
        Banner::create([
            'image' => $img_path,
        ]);
    }
}
