<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Banner extends Model
{
    use HasFactory;

    protected $table = 'banners';

    protected $fillable = [
        'image',
    ];

    //情報取得用変数
    public function getBanner() {
        $banners = Banner::all();
        return $banners;
    }

    //登録処理
    public function registBanner($bannerId, $img_path) {
        if ($bannerId) {
            // 既存のバナーを更新
            Banner::where('id', $bannerId)->update(['image' => $img_path]);
        } else {
            // 新しいバナーを作成
            Banner::create(['image' => $img_path]);
        }
    }
}
