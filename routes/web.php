<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\TopController;
use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\Auth\RegisterController;
use App\Http\Controllers\Admin\CurriculumController;

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

Route::get('/', function () {
    return view('admin.auth.login');
});

//Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('user')->namespace('User')->name('user.')->group(function () {
    //ログイン画面表示
    Route::get('/auth/login', [App\Http\Controllers\User\Auth\LoginController::class, 'showLoginForm'])->name('show.login');
    //ログイン
    Route::post('/auth/login', [App\Http\Controllers\User\Auth\LoginController::class, 'login'])->name('login');
    //ログアウト
    Route::post('/logout', [App\Http\Controllers\User\Auth\LoginController::class,'logout'])->name('logout');
    //新規登録画面表示
    Route::get('/auth/register', [App\Http\Controllers\User\Auth\RegisterController::class, 'showRegisterForm'])->name('show.register');
    //新規登録処理
    Route::post('/auth/register', [App\Http\Controllers\User\Auth\RegisterController::class, 'register'])->name('register');

    //トップ画面
    Route::get('/top', [App\Http\Controllers\User\TopController::class, 'showTop'])->middleware(['auth:user'])->name('show.top');
    //授業一覧画面
    Route::get('/curriculum_list', [App\Http\Controllers\User\CurriculumController::class, 'showCurriculumList'])->name('show.curriculum');
    //授業進捗画面
    Route::get('/progress', [App\Http\Controllers\User\ProgressController::class, 'showProgress'])->name('show.progress');
    //プロフィール設定画面
    Route::get('/profile', [App\Http\Controllers\User\ProfileController::class, 'showProfileForm'])->name('show.profile');
    //授業配信画面
    Route::get('/delivery/{id}', [App\Http\Controllers\User\DeliveryController::class, 'showDelivery'])->name('show.delivery');
});

Route::prefix('admin')->namespace('Admin')->name('admin.')->group(function () {
    //ログイン画面表示
    Route::get('/auth/login', [App\Http\Controllers\Admin\Auth\LoginController::class, 'showLoginForm'])->name('show.login');
    //ログイン
    Route::post('/auth/login', [App\Http\Controllers\Admin\Auth\LoginController::class, 'login'])->name('login');
    //ログアウト
    Route::post('/logout', [App\Http\Controllers\Admin\Auth\LoginController::class,'logout'])->name('logout');
    //新規登録画面表示
    Route::get('/auth/register', [App\Http\Controllers\Admin\Auth\RegisterController::class, 'showRegisterForm'])->name('show.register');
    //新規登録処理
    Route::post('/auth/register', [App\Http\Controllers\Admin\Auth\RegisterController::class, 'register'])->name('register');

    //ログイン後
    Route::middleware(['auth:admin'])->group(function () {
        //トップ画面
        Route::get('/top', [App\Http\Controllers\Admin\TopController::class, 'showTop'])->name('show.top');
        //授業一覧画面
        Route::get('/curriculum_list', [App\Http\Controllers\Admin\CurriculumController::class, 'showCurriculumList'])->name('show.curriculum.list');
        //お知らせ一覧画面
        Route::get('/article_list', [App\Http\Controllers\Admin\ArticleController::class, 'showArticleList'])->name('show.article.list');

        //バナー設定画面
        Route::get('/banner_edit', [App\Http\Controllers\Admin\BannerController::class, 'showBannerEdit'])->name('show.banner.edit');
        //バナー登録
        Route::post('/banner_edit', [App\Http\Controllers\Admin\BannerController::class, 'registerBannerEdit'])->name('register.banner.edit');
        //バナー削除
        Route::post('/destroy/{id}', [App\Http\Controllers\Admin\BannerController::class, 'destroy']);
        });
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('user')->namespace('User')->name('user.')->group(function () {

    //時間割画面
    Route::get('/curriculum_list/{id}', [App\Http\Controllers\CurriculumController::class, 'showCurriculumList'])->name('show.curriculum');
});



Route::prefix('admin')->namespace('Admin')->name('admin.')->group(function () {

    //ログイン
    Route::get('/login', 'admin/login');
    //
    Route::post('/login', [App\Http\Controllers\Auth\LoginController::class, 'login'])->name('');
    //ログアウト
    Route::post('/logout', [App\Http\Controllers\Auth\LoginController::class,'logout']);
    //新規登録画面
    Route::get('/register', [App\Http\Controllers\Auth\RegisterController::class, 'showRegisterForm'])->name('show.register');
    //新規登録処理
    Route::post('/register', [App\Http\Controllers\Auth\RegisterController::class, 'register']);
    //
    Route::get('/home', 'admin/home')->middleware('auth:admin');

    //バナー設定画面
    Route::get('/banner_edit', [App\Http\Controllers\BannerController::class, 'showBannerEdit'])->name('show.banner.edit');
    //バナー登録
    Route::post('/banner_edit', [App\Http\Controllers\BannerController::class, 'registerBannerEdit'])->name('register.banner.edit');
    //バナー削除
    Route::post('/destroy/{id}', [App\Http\Controllers\BannerController::class, 'destroy']);

});

