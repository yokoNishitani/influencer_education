<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Http\Requests\ArticleRequest;
use Illuminate\Support\Facades\DB;

class ArticleController extends Controller
{
        //トップページ（仮）user
        public function showUserTop()
        {
            return view('user.top');
        }

        public function showArticle($id)
    {
        $article = Article::findOrFail($id);
        return view('user.article', compact('article'));
    }
}
