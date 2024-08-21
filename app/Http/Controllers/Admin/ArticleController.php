<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Http\Requests\ArticleRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ArticleController extends Controller

{
    //トップページ（仮）admin
    public function showAdminTop()
    {
        return view('admin.top');
    }

    //管理画面_お知らせ一覧
    public function showArticleList()
    {
        $articles = Article::orderBy('posted_date', 'desc')
            ->orderBy('id', 'desc')
            ->get();

        return view('admin.article_list', compact('articles'));
    }

    //管理画面_お知らせ新規登録（表示）
    public function showArticleCreate()
    {
        $articles = Article::all();
        return view('admin.article_create', compact('articles'));
    }

    // 管理画面_お知らせ新規登録（登録）
    public function showArticleStore(ArticleRequest $request)
    {
        DB::beginTransaction();
        try {
            $article = new Article();
            $article->posted_date = $request->posted_date;
            $article->title = $request->title;
            $article->article_contents = $request->article_contents;

            $article->save();

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            return back();
        }

        return redirect()->route('admin.show.article.create');
    }

    //管理画面_お知らせ設定（表示）
    public function showArticleEdit($id)
    {
        $article = Article::findOrFail($id);
        return view('admin.article_edit', compact('article'));
    }

    //管理画面_お知らせ設定（更新）
    public function showArticleUpdate(ArticleRequest $request, $id)
    {
        DB::beginTransaction();
        try {
            $article = Article::find($id);

            $article->posted_date = $request->posted_date;
            $article->title = $request->title;
            $article->article_contents = $request->article_contents;
            $article->save();

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            return back();
        }

        return redirect()->route('admin.show.article.edit', $article->id);
    }

    //管理画面_お知らせ削除
    public function showArticleRemove($id)
    {
        try {
            $article = Article::findOrFail($id);
            $article->delete();
            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            return response()->json(['success' => false]);
        }
    }
}
