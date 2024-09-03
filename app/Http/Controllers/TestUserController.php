<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article; 
use App\Models\Banner;

class TestUserController extends Controller
{
    public function index()
    {
        $articles = Article::all();
        $banners = Banner::all();

        return view('top', compact('banners', 'articles'));
    }
}