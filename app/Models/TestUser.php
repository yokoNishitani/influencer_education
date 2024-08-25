<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TestUser extends Model
{
    use HasFactory;

    use HasFactory;

    public function index()
    {
        $articles = Article::all();
        return view('layouts.top', compact('articles'));
    }
}
