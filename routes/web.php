<?php
use App\Http\Controllers;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\User\RecruitController;
use App\Http\Controllers\User\EntryController;
use App\Http\Controllers\User\FavoriteController;
use App\Http\Controllers\User\QuitController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//オーナーがログインした場合のルーティング
Route::middleware(['auth', 'role:1'])->group(function () {
    Route::get('/owner/dashboard', function () {
        return view('owner.dashboard');
    });
});

// ユーザーがログインした場合のルーティング
// ルートグループに共通のURLプレフィックスを付けるprefix('user')
Route::prefix('user')->middleware(['auth', 'role:0'])->group(function () {
    // Route::get('/user/home', function () {
    // return view('user.home');

    // 求人一覧・詳細
    Route::get('/recruits', [RecruitController::class, 'index'])->name('recruits.index');
    Route::get('/recruits/{recruit}', [RecruitController::class, 'show'])->name('recruits.show');


    // 応募
    Route::post('recruits/{recruit}/entry/store', [EntryController::class, 'store'])->name('recruits.entry.store');
    Route::get('recruits/entries', [EntryController::class, 'index'])->name('recruits.entry.index');

    // お気に入り
    Route::post('recruits/{recruit}/favorite/store', [FavoriteController::class, 'store'])->name('recruits.favorite.store');
    Route::get('recruits/favorites', [FavoriteController::class, 'index'])->name('recruits.favorite.index');
    Route::post('recruits/{recruit}/favorite/delete', [FavoriteController::class, 'destroy'])
        ->name('user.recruits.favorite.destroy');

    // 退会
    Route::get('quit', [QuitController::class, 'edit'])->name('quit.edit'); // update → edit に修正
    Route::post('quit/store', [QuitController::class, 'store'])->name('quit.store');

    // });
});
require __DIR__ . '/auth.php';
