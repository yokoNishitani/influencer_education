<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article; 

class TestUserController extends Controller
{
    public function index()
    {
        $articles = Article::all();
        
        return view('top', compact('articles'));
    }
}