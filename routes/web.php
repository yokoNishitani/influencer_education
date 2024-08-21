<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\Admin\ArticleController;
use App\Http\Controllers\User\ArticleController as UserArticleController;
use App\Http\Controllers\User\ProfileController;
use App\Http\Controllers\User\ProgressController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('admin')->namespace('Admin')->name('admin.')->group(function () {
    //TOP（仮）
    Route::get('/top', [ArticleController::class, 'showAdminTop'])->name('show.top');

    //管理画面_お知らせ一覧、新規登録
    Route::get('/article_list', [ArticleController::class, 'showArticleList'])->name('show.article.list');
    Route::get('/article_create', [ArticleController::class, 'showArticleCreate'])->name('show.article.create');
    Route::post('/article_create', [ArticleController::class, 'showArticleStore'])->name('show.article.store');
    Route::post('/article_edit/{id}', [ArticleController::class, 'showArticleUpdate'])->name('show.article.update');
    Route::delete('/article_list/{id}', [ArticleController::class, 'showArticleRemove'])->name('show.article.remove');

    //管理画面_お知らせ設定
    Route::get('/article_edit/{id}', [ArticleController::class, 'showArticleEdit'])->name('show.article.edit');
});

Route::prefix('user')->namespace('User')->name('user.')->group(function () {
    //TOP（仮）
    Route::get('/top', [UserArticleController::class, 'showUserTop'])->name('show.top');

    //ユーザー画面_お知らせ
    Route::get('/article/{id}', [UserArticleController::class, 'showArticle'])->name('show.article');

    Route::middleware('auth')->group(function () {
        //ユーザー画面_プロフィール変更
        Route::get('/profile_edit', [ProfileController::class, 'showProfileForm'])->name('show.profile');
        Route::post('/profile_edit', [ProfileController::class, 'showProfileEdit']);

        //ユーザー画面_パスワード変更
        Route::get('/password_edit', [ProfileController::class, 'showPasswordForm'])->name('show.password.edit');
        Route::post('/password_edit', [ProfileController::class, 'showPasswordEdit']);

        //ユーザー画面_進捗
        Route::get('/curriculum_progress', [ProgressController::class, 'showProgress'])->name('show.progress');

        //配信(仮)
        Route::get('/delivery/{id}', [ProgressController::class, 'showDelivery'])->name('show.delivery');
    });
});
