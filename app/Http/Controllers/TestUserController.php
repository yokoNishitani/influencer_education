<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestUserController extends Controller
{
    public function index()
    {
        $articles = Article::all();
        return view('layouts.top', compact('articles'));
    }
}
