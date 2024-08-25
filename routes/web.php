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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::view('/user/login', 'user/login');
Route::post('/user/login', [App\Http\Controllers\User\LoginController::class, 'login']);
Route::post('user/logout', [App\Http\Controllers\User\LoginController::class,'logout']);
Route::view('/user/register', 'user/register');
Route::post('/user/register', [App\Http\Controllers\User\RegisterController::class, 'register']);
Route::view('/user/home', 'user/home')->middleware('auth:user');
Route::view('/user/password/reset', 'user/passwords/email');
Route::post('/user/password/email', [App\Http\Controllers\User\ForgotPasswordController::class, 'sendResetLinkEmail']);
Route::view('/user/password/reset/{token}', [App\Http\Controllers\aUser\ResetPasswordController::class,'showResetForm']);
Route::post('/user/password/reset', [App\Http\Controllers\User\ResetPasswordController::class, 'reset']);
Route::get('/top', [App\Http\Controllers\TestUserController::class, 'index'])->name('top');
