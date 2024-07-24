<?php

use Illuminate\Support\Facades\Route;

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
    return view('welcome');
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

