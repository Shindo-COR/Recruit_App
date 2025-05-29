<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\CompanyController;

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/dashboard', function () {
    return view('top');
})->middleware(['auth'])->name('top');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


//管理者権限を持ったユーザのページ作成
//登録している企業一覧
Route::get('/admin/companies', [CompanyController::class, 'index']);
//企業登録ページに遷移
Route::get('/admin/companies/create', [CompanyController::class, 'create']);
//新規企業をデータベースに登録
Route::post('/admin/companies/store', [CompanyController::class, 'store']);
//企業詳細ページに遷移
Route::get('/admin/companies/{company}', [CompanyController::class, 'show']);
//企業が出している求人一覧
Route::get('/admin/companies/{company}/recruits', [CompanyController::class, 'RecruitsIndex']);
//求人詳細ページに遷移
Route::get('/admin/companies/{company}/recruits/{recruit}', [CompanyController::class, 'RecruitsShow']);
//求人編集ページに遷移
Route::get('/admin/companies/{company}/edit', [CompanyController::class, 'edit']);
//求人情報を更新
Route::post('/admin/companies/{company}/update', [CompanyController::class, 'update']);
//求人情報を削除
Route::post('/admin/companies/{company}/destroy', [CompanyController::class, 'destroy']);
