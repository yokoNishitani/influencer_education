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
        if($bannerId) {
            Banner::where('id', $bannerId)->update(['image' => $img_path]);
        } else {
            Banner::create(['image' => $img_path]);
        }
    }
}
