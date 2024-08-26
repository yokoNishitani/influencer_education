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
Route::get('/user/login', [LoginController::class, 'showLoginForm'])->name('user.login');
Route::post('/user/login', [LoginController::class, 'login']);
Route::post('/user/logout', [LoginController::class, 'logout'])->name('user.logout');
Route::get('/user/register', [RegisterController::class, 'showRegistrationForm'])->name('user.register');
Route::post('/user/register', [RegisterController::class, 'register']);
Route::get('/user/password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('user.password.request');
Route::post('/user/password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('user.password.email');
Route::get('/user/password/reset/{token}', [ResetPasswordController::class, 'showResetForm'])->name('user.password.reset');
Route::post('/user/password/reset', [ResetPasswordController::class, 'reset']);
// ユーザーホームルート
Route::view('/user/home', 'user.home')->middleware('auth:user')->name('user.home');
// トップページのルート
Route::get('/top', [TestUserController::class, 'index'])->name('top');
