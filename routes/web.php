<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\User\DeliveryController;
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

// ユーザー認証関連ルート
Route::get('/user/login', [LoginController::class, 'showLoginForm'])->name('user.login');
Route::post('/user/login', [LoginController::class, 'login']);
Route::post('/user/logout', [LoginController::class, 'logout'])->name('user.logout');

// ユーザー登録関連ルート
Route::get('/user/register', [RegisterController::class, 'showRegistrationForm'])->name('user.register');
Route::post('/user/register', [RegisterController::class, 'register']);

// パスワードリセット関連ルート
Route::get('/user/password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('user.password.request');
Route::post('/user/password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('user.password.email');
Route::get('/user/password/reset/{token}', [ResetPasswordController::class, 'showResetForm'])->name('user.password.reset');
Route::post('/user/password/reset', [ResetPasswordController::class, 'reset']);

// ユーザーホームルート
Route::view('/user/home', 'user.home')->middleware('auth:user')->name('user.home');

// トップページのルート
Route::get('/top', [App\Http\Controllers\TestUserController::class, 'index'])->name('top');

//時間割一覧のルート
Route::get('/schedule', [ScheduleController::class, 'showCurriculumList'])->name('show.curriculum');

//配信画面のルート
Route::get('/delivery/{id}', [DeliveryController::class, 'showDelivery'])->name('show.delivery');
Route::post('/curriculums/create', [DeliveryController::class, 'createCurriculum'])->name('create.curriculum');