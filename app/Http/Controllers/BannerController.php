<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Banner;

class BannerController extends Controller
{
    public function store(Request $request)
    {
        $banners = Banner::all(); 
        return view('create');
    }
}
