<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\User\DeliveryController;
use App\Http\Controllers\YourController;
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

Route::get('/login', function () {
    return redirect('/user/login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('user')->group(function () {
// ユーザー認証関連ルート
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('user.login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('user.logout');

// ユーザー登録関連ルート
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('user.register');
Route::post('/register', [RegisterController::class, 'register']);

// パスワードリセット関連ルート
Route::get('/password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('user.password.request');
Route::post('/password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('user.password.email');
Route::get('/password/reset/{token}', [ResetPasswordController::class, 'showResetForm'])->name('user.password.reset');
Route::post('/password/reset', [ResetPasswordController::class, 'reset']);

// ユーザーホームルート
Route::view('/home', 'user.home')->middleware('auth:user')->name('user.home');
});


// トップページのルート
Route::get('/top', [App\Http\Controllers\TestUserController::class, 'index'])->name('top');

//時間割一覧のルート
Route::get('/schedule', [ScheduleController::class, 'showCurriculumList'])->name('show.curriculum');

//配信画面のルート
Route::get('/delivery/{id}', [DeliveryController::class, 'showDelivery'])->name('show.delivery');
Route::post('/curriculum/{id}/mark-completed', [DeliveryController::class, 'markCompleted'])->name('mark.completed');
Route::post('/curriculums/create', [DeliveryController::class, 'createCurriculum'])->name('create.curriculum');

// 受講済みをマークするルート
Route::post('/curriculum/{id}/mark-completed', [YourController::class, 'markCompleted'])->name('mark.completed');

