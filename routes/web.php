<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CurriculumController; // ここでCurriculumControllerをインポート
use App\Http\Controllers\DeliveryController;



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



// 授業一覧用
Route::get('/culliculum_list', [CurriculumController::class, 'index'])->name('curriculums.index');

// 授業設定用
Route::get('/culliculum_create', [CurriculumController::class, 'create'])->name('curriculums.create');
Route::post('/culliculum_create', [CurriculumController::class, 'store'])->name('curriculums.store');

// 編集ページのルート
Route::get('/culliculum_edit/{id}', [CurriculumController::class, 'edit'])->name('curriculums.edit');

// 更新処理のルート
Route::put('/culliculum_update/{id}', [CurriculumController::class, 'update'])->name('curriculums.update');

// 配信日時設定用
Route::get('/delivery', [DeliveryController::class, 'index'])->name('delivery.index');




