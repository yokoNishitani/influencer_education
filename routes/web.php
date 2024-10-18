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
Route::get('/curriculum_list', [CurriculumController::class, 'index'])->name('curriculums.index');

// 授業設定用
Route::get('/culliculum_create', [CurriculumController::class, 'create'])->name('curriculums.create');

Route::post('/curriculum_create', [CurriculumController::class, 'store'])->name('curriculums.store');

// 編集ページのルート
Route::get('/curriculum_edit/{id}', [CurriculumController::class, 'edit'])->name('curriculums.edit');

// 更新処理のルート
Route::put('/curriculums/{id}', [CurriculumController::class, 'update'])->name('curriculums.update');

// 配信日時設定用
Route::get('/delivery/{curriculums_id}', [DeliveryController::class, 'index'])->name('delivery.index');
Route::post('/delivery', [DeliveryController::class, 'store'])->name('delivery.store');
Route::get('/delivery/{curriculums_id}/edit', [DeliveryController::class, 'edit'])->name('delivery.edit');
Route::put('/delivery/{curriculums_id}/{deliveryTime}', [DeliveryController::class, 'update'])->name('delivery.update');








