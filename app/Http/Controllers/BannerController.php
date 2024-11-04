<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Banner;

class BannerController extends Controller
{
    public function showList() {
        $model = new Banner();
        $banners = $model->getList();

        return view('image', ['banners' => $banners]);
    }
}
