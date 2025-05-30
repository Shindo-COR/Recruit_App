<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;


use App\Http\Controllers\User\RecruitController;
use App\Http\Controllers\User\EntryController;
use App\Http\Controllers\User\FavoriteController;
use App\Http\Controllers\User\QuitController;

use App\Http\Middleware\RoleMiddleware;

use App\Http\Controllers\Auth\AuthenticatedSessionController;

use App\Http\Controllers\Admin\CompanyController;

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

Route::get('/login', [AuthenticatedSessionController::class, 'create'])
            ->name('login');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


//管理者がログインした場合のルーティング
Route::middleware(['auth', 'role:2'])->group(function () {
    //管理者権限を持ったユーザのページ作成
    //登録している企業一覧
    Route::get('/admin/companies', [CompanyController::class, 'index']);
    //企業登録ページに遷移
    Route::get('/admin/companies/create', [CompanyController::class, 'create']);
    //新規企業をデータベースに登録
    Route::post('/admin/companies/store', [CompanyController::class, 'store']);
    //削除済み企業一覧
    Route::get('/admin/companies/destroyed', [CompanyController::class, 'destroyIndex']);
    //企業詳細ページに遷移
    Route::get('/admin/companies/{company}', [CompanyController::class, 'show']) -> name('admin.companies.show');
    //企業が出している求人一覧
    Route::get('/admin/companies/{company}/recruits', [CompanyController::class, 'recruitsIndex']);
    //求人詳細ページに遷移
    Route::get('/admin/companies/{company}/recruits/{recruit}', [CompanyController::class, 'recruitsShow']);
    //企業編集ページに遷移
    Route::get('/admin/companies/{company}/edit', [CompanyController::class, 'edit']);
    //企業情報を更新
    Route::post('/admin/companies/{company}/update', [CompanyController::class, 'update']);
    //企業情報を削除
    Route::post('/admin/companies/{company}/destroy', [CompanyController::class, 'destroy']);
});


//オーナーがログインした場合のルーティング
Route::middleware(['auth', 'role:1'])->group(function () {
    Route::get('/company/recruits', function () {
        return view('/company/recruits');///company/recruits
    });
});

// ユーザーがログインした場合のルーティング
// ルートグループに共通のURLプレフィックスを付けるprefix('user')
Route::prefix('user')->middleware(['auth', 'role:0'])->group(function () {
    // 追加
    Route::get('/dashboard', [RecruitController::class, 'index'])->middleware(['auth'])->name('dashboardからのindex');
    // Route::get('/user/home', function () {
    // return view('user.home');

    // 求人一覧・詳細
    Route::get('/recruits', [RecruitController::class, 'index'])->name('user.recruits.index');
    Route::get('/recruits/{recruit}', [RecruitController::class, 'show'])->name('recruits.show');


    // 応募
    Route::post('recruits/{recruit}/entry/store', [EntryController::class, 'store'])->name('recruits.entry.store');
    Route::get('recruits/entries', [EntryController::class, 'index'])->name('user.recruits.entry.index');

    // お気に入り
    Route::post('recruits/{recruit}/favorite/store', [FavoriteController::class, 'store'])->name('user.recruits.favorite.store');
    Route::get('recruits/favorites', [FavoriteController::class, 'index'])->name('user.recruits.favorite.index');
    Route::post('recruits/{recruit}/favorite/delete', [FavoriteController::class, 'destroy'])
        ->name('user.recruits.favorite.destroy');

    // 退会
    Route::get('quit', [QuitController::class, 'edit'])->name('quit.edit'); // update → edit に修正
    Route::post('quit/store', [QuitController::class, 'store'])->name('quit.store');

    // });
})->middleware(RoleMiddleware::class);
require __DIR__ . '/auth.php';
