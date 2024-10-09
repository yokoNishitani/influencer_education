<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class TestUser extends Model
{
    public function index()
    {
        $articles = Article::all();
        $banners = Banner::all();
        

        return view('layouts.top', compact('articles'));
    }

    public function curriculumProgress()
    {
        return $this->hasMany(CurriculumProgress::class, 'users_id');
    }
}
